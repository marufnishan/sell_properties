<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Property;
use App\Models\TransactionHistory ;
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

        $exchangeRate = 110.32;
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

        $authorizeNetPayment = new AuthorizeNetPayment();
        $responseData = $authorizeNetPayment->chargeCreditCard($object);

        $transactionResponse = $responseData->getTransactionResponse();
        $errors = $transactionResponse->getErrors();
        $transID = $transactionResponse->getTransId();
        $networkTransId = $transactionResponse->getNetworkTransId();
        $accountNumber = $transactionResponse->getAccountNumber();
        $accountType = $transactionResponse->getAccountType();

        $rfid = get_object_vars(json_decode(json_encode($responseData)))['refId'];
        $messages = get_object_vars(json_decode(json_encode($responseData)))['messages'];
        $status = get_object_vars(json_decode(json_encode($messages)))['resultCode'];

        if ($status == 'Ok' && is_null($errors)) {
            $data=[
                "user_id"=> auth()->id() ?? null,
                "property_id"=> $propertie->id,
                "transaction_id"=> $transID ,
                "network_transaction_id"=> $networkTransId,
                "account_number"=> $accountNumber ,
                "account_type"=> $accountType,
                "payment_method"=>"Authorize.net",
                "amount"=> $amountInUSD,
                "status"=>1,
            ];

            $result= TransactionHistory::create($data);

            if($result)
            {
                return redirect()->back()->with('success', 'Property payment successful.Thank You.');
            }
            else
            {
                return redirect()->back()->with('success', 'Property payment failed');
            }

        }
        else
        {
            $errors = $errors[0];
            $errorCode = $errors->getErrorCode();
            $errorText = $errors->getErrorText();
            return redirect()->back()->with('error', 'Property payment failed.'.$errorText);
        }


    }
    public function store(Request $request)
    {
        try {
            $inputs=$request->all();
            $inputs['owner_id']=auth()->id() ?? null;
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
