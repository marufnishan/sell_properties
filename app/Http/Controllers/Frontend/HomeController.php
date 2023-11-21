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
        $data= Property::create($request->all());

        return redirect()->back();
    }

    public function cart()
    {

        return view('frontend.cart');
    }

}
