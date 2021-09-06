<?php

namespace App\Http\Controllers\backend;

use App\Area;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function cities(){
        $cities = City::all();
        return view('backend.location..cities', compact('cities'));
    }

    public function city_store(Request $request){
        $this->validate($request, [
            'name' => 'required | unique:cities'
        ]);
        City::query()->create($request->all());
        return redirect()->back()->with('success',' City Has been added successfully');
    }

    public function city_edit($id){
        $city = City::query()->findOrFail($id);
        return view('backend.location.edit-city', compact('city'));
    }

    public function city_update(Request $request)
    {
        $city = City::query()->findOrFail($request->id);
        if ($city) {
            $city->update($request->all());
        }
        return redirect(route('city_index'))->with('success',' City Has been updated successfully');
    }

    public function city_erase(Request $request){
        City::query()->findOrFail($request->id)->delete();
        return redirect(route('city_index'))->with('success',' City Has been Deleted successfully');
    }

    /*Area Control*/
    public function area(){
        $cities = City::query()->where('status', 1)->pluck('name', 'id');
        $areas = Area::all();
        return view('backend.location..areas', compact('cities', 'areas'));
    }

    public function area_store(Request $request){
        $this->validate($request, [
            'name' => 'required | unique:areas',
            'city_id' => 'required'
        ]);
        Area::query()->create($request->all());
        return redirect()->back()->with('success',' Area Has been added successfully');
    }

    public function area_edit($id){
        $cities = City::query()->where('status', 1)->pluck('name', 'id');
        $area = Area::query()->findOrFail($id);
        return view('backend.location.edit-area', compact('area','cities'));
    }

    public function area_update(Request $request)
    {
        $area = Area::query()->findOrFail($request->id);
        if ($area) {
            $area->update($request->all());
        }
        return redirect(route('area_index'))->with('success',' Area Has been updated successfully');
    }

    public function area_erase(Request $request){
        Area::query()->findOrFail($request->id)->delete();
        return redirect(route('area_index'))->with('success',' Area Has been Deleted successfully');
    }
}
