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

class HomeController extends Controller
{


    public function index()
    {
        $properties=Property::all();

        return view('frontend.home',compact('properties'));
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
                $inputs['image']=$image_name;
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
