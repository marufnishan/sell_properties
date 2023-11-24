<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties=Property::all();

        return view('backend.property.show',compact('properties'));
    }
    public function create()
    {
        $users=User::all();

        return view('backend.property.add',compact('users'));
    }

    public function destroy($id)
    {
        $property = Property::find($id);

        if ($property) {
            $property->delete();
            return redirect()->back()->with('error', 'Property deleted successfully!');
        }

        return redirect()->back()->with('error', 'Property not found!');
    }
}
