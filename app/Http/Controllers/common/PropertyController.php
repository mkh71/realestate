<?php

    namespace App\Http\Controllers\common;

    use App\Feature;
    use App\HomeType;
    use App\Http\Controllers\Controller;
    use App\Property;
    use Illuminate\Http\Request;
    use App\Traits\PropertyAdd;

    class PropertyController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }

        use PropertyAdd;

        public function index(Request $request)
        {
            $homeTypes = HomeType::query()->pluck('name', 'id');
            $status= $request->status;
            $properties = Property::query()
                ->where('user_id', auth()->id())
                ->where('status', $status)
                ->orderBy('id', 'desc')
                ->get();
            return view('backend.property.index', compact('properties', 'homeTypes','status'));
        }

        public function add()
        {
            if(type() != 1){
                $con = $this->condition();
                if ($con['pack'] == "pack0")
                    return redirect(route('packages'))->with('warning', 'Please, choice a package fist for advertising your property. Thank You');
                if ($con['pack'] == 'packActive0')
                    return redirect(route('packages'))->with('warning', 'Sorry, You have not any active Package. Please, Choice anyone package fist for advertising your property. Thank You');
            }
            $homeTypes = HomeType::query()->pluck('name', 'id');
            return view('backend.property.add', compact('homeTypes'));
        }

        public function store(Request $request)
        {
            $insert = $this->property_insert($request);

            if ($insert == "pack0")
                return redirect(route('packages'))->with('warning', 'Please, choice a package fist for advertising your property. Thank You');
            if ($insert == 'packActive0')
                return redirect(route('packages'))->with('warning', 'Sorry, You have not any active Package. Please, Choice anyone package fist for advertising your property. Thank You');

            if ($insert == 0)
                return redirect()->back()->with('error', 'Validation Failed');
            if ($insert == '400')
                return redirect()->back()->with('error', 'Error to insert new property.');
            if ($insert != 201)
                return redirect()->back()->with('error', 'Your property is not listed. Please try again.');

            if ($insert == 201){
                return redirect()->back()->with('success', 'Property has been added successfully');
            }
        }

        public function edit($id)
        {
            $data = Property::query()->findOrFail($id);
            $homeTypes = HomeType::query()->pluck('name', 'id');
            return view('backend.property.edit', compact('data', 'homeTypes'));
        }

        public function update(Request $request)
        {
            $update = $this->propertyUpdate($request);
            if ($update == 0)
                return redirect()->back()->with('error', 'Validation Failed');
            if ($update == 201)
                return redirect()->route('property_index',['status'=>1])->with('success', "Property is updated successfully");
            if ($update == '400')
                return redirect()->back()->with('error', 'Error to update new property.');

            if ($update != 201)
                return redirect()->route('property_index', ['status'=>1])->with('error', 'Your property is not update. Please try again.');

        }

        public function erase(Request $request)
        {
            $prop = Property::query()->find($request->id);
            $data['status'] = 5;
            $prop->update($data);
            return redirect()->back();
        }
    }
