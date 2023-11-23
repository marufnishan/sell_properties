<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Authorize\AuthorizeNetPayment;

class HomeController extends Controller
{


    public function index()
    {
        $properties=Property::all();

        return view('frontend.home',compact('properties'));
    }

    public function propertyView($id)
    {
        $propertie=Property::findOrFail($id);

        return view('frontend.property-view',compact('propertie'));
    }

    public function propertyPurchase($id)
    {
        $propertie=Property::findOrFail($id);
        return view('frontend.purchase',compact('propertie'));
    }

    public function propertyPurchaseStore(Request $request,$id)
    {
        // $request->validate([
        //     'payment_method' => 'required',
        //     'card' => ['required', 'numeric', 'regex:/^[0-9]+$/'],
        //     'expmonth' => 'required',
        //     'expyear' => 'required|date_format:Y',
        // ]);

        $propertie=Property::findOrFail($id);

        if(!$propertie)
        {
            return redirect()->back()->with('error', 'Property not found.');
        }
        // Assuming $propertie->price is in BDT
        $exchangeRate = 110.32; // Replace this with the actual exchange rate

        // Convert BDT to USD
        $amountInUSD = $amountInUSD = (float) $propertie->price / $exchangeRate;
        $amountInUSD = number_format($amountInUSD, 2, '.', '');
        $object = [
            '_token' => $request->_token,
            'card' => $request->card,
            'expmonth' => $request->expmonth,
            'expyear' => $request->expyear,
            'amount' => $amountInUSD,
            'pay' => $request->pay,

        ];
         //dd($object);

        $authorizeNetPayment = new AuthorizeNetPayment();
        $responseData = $authorizeNetPayment->chargeCreditCard($object);

        $transactionResponse = $responseData->getTransactionResponse();
        $errors = $transactionResponse->getErrors();
dd($transactionResponse);
        $rfid = get_object_vars(json_decode(json_encode($responseData)))['refId'];
        //dd( $transactionResponse->getRefTransID());
        $messages = get_object_vars(json_decode(json_encode($responseData)))['messages'];
        $status = get_object_vars(json_decode(json_encode($messages)))['resultCode'];

        if ($status == 'Ok' && is_null($errors)) {
            $order->payment_id = $rfid;
            $order->payment_status = 'paid';
            $order->save();
        }
    }
    public function store(Request $request)
    {
        try {
            $inputs=$request->all();
            if($request->hasFile('image'))
            {
                $imagePath="uploads/property_images";
                $image_name =Str::random(6)."-property-image".".jpg";
                $image = $request->file('image');
                if (!File::isDirectory(base_path().'/public/'.$imagePath)){
                    File::makeDirectory(base_path().'/public/'.$imagePath, 0777, true, true);
                }
                $image->move(public_path($imagePath),$image_name);
                $inputs['image']=$imagePath."/".$image_name;
            }

            $data = Property::create($inputs);
            return redirect()->back()->with('success', 'Property sell request created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error creating property sell request: ' . $e->getMessage());
        }
    }

    public function cart()
    {

        return view('frontend.cart');
    }

}
