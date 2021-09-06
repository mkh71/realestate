<?php

namespace App\Http\Controllers\backend;

use App\Feature;
use App\HomeType;
use App\Http\Controllers\Controller;
use App\Property;
use App\PropertyDocument;
use App\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Traits\PropertyAdd;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkType']);
    }

    use PropertyAdd;

    public function index(){
        $homeTypes = HomeType::query()->pluck('name', 'id');
        $properties = Property::query()
            ->where('user_id', auth()->id())
            ->whereIn('status', [0,4])
            ->orderBy('id', 'desc')
            ->get();
        return view('backend.property.index', compact('properties','homeTypes'));
    }

    public function add(){
        $homeTypes = HomeType::query()->pluck('name', 'id');
        return view('backend.property.add', compact('homeTypes'));
    }

    public function store(Request $request){
        $insert = $this->property_insert($request);

        /*if ($insert == "pack0")
            return redirect(route('packages'))->with('warning', 'Please, choice a package fist for advertising your property. Thank You');
        if ($insert == 'packActive0')
            return redirect(route('packages'))->with('warning', 'Sorry, You have not any active Package. Please, Choice anyone package fist for advertising your property. Thank You');*/

        if ($insert == 0)
            return redirect()->back()->with('error', 'Validation Failed');
        if ($insert == 201)
            return redirect()->back()->with('success', 'Property has been added successfully');
        if ($insert == 400)
            return redirect()->back()->with('error', 'Error to insert new property.');

        if ($insert!= 201)
            return redirect()->back()->with('error', 'Your property is not listed. Please try again.');
    }

    public function edit($id){
        $data = Property::query()->findOrFail($id);
        $homeTypes = HomeType::query()->pluck('name', 'id');
        return view('backend.property.edit',compact('data','homeTypes'));
    }

    public function update(Request $request){
        $update = $this->propertyUpdate($request);
        if ($update == 0)
            return redirect()->back()->with('error', 'Validation Failed');
        if ($update == 201)
            return redirect()->route('property_index')->with('success', "Property is updated successfully");
        if ($update == 400)
            return redirect()->back()->with('error', 'Error to update new property.');

        if ($update!= 201)
            return redirect()->route('property_index')->with('error', 'Your property is not listed. Please try again.');

    }

    public function erase(Request $request){
        $prop = Property::query()->find($request->id);
        $data['status'] = 5;
        $prop->update($data);
        return redirect()->back();
    }
}
