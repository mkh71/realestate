<?php

namespace App\Http\Controllers\common;

use App\Booking;
use \App\Property;
use App\Http\Controllers\Controller;
use App\Tour;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function get_request(Request $request){
        $ids = myActiveProperties();
        $for = $request->for;
        $status = $request->status;
        if ($for == 3){
            $infos = Tour::query()
                ->whereIn('property_id', $ids)
                ->where('status', $status)
                ->get()
                ->groupBy('property_id');
        }
        if ($for == 0 || $for == 1 || $for ==2){
            $infos = Booking::query()
                ->whereIn('property_id', $ids)
                ->where('for', $for)
                ->where('status', $status)
                ->get()
                ->groupBy('property_id');
        }

        return view('backend.my-property.booklist.index', compact('infos', 'for', 'status'));
    }

    public function deny_request(Request $request){
        if ($request->for == 3){
            $data = Tour::query()->find($request->id);
            $data->update(['status'=>3, 'admin_note'=>$request->admin_note]);
        }else{
            $data = Booking::query()->find($request->id);
            $data->update(['status'=>3, 'admin_note'=>$request->admin_note]);
        }
        return redirect()->back()->with('success', 'Request Denied');
    }

    public function accept_request(Request $request){
        if ($request->for == 3){
            $tour = Tour::query()->find($request->id);
            $tour->update(['status'=>1, 'admin_note'=>$request->admin_note]);
        }else{
            $data = Booking::query()->find($request->id);
            $property = Property::query()->find($data->property_id);
            $property->update(['status'=>2]);

            $data->update(['status'=>1, 'date'=>$request->date, 'admin_note'=>$request->admin_note]);
        }
        return redirect()->back()->with('success', 'Request Accepted');
    }

    public function complete_request($id, $for){
        if ($for == 3){
            $tour = Tour::query()->find($id);
            $tour->update(['status'=>2]);
        }else{
            $data = Booking::query()->find($id);
            $property = Property::query()->find($data->property_id);
            $property->update(['status'=>4]);

            $data->update(['status'=>2]);
        }
        return redirect()->back()->with('success', 'Request Complete');
    }
    public function active_users($for, $status){
        $ids = myActiveProperties();
        $infos = Property::query()
            ->whereIn('id', $ids)
            ->where('for', $for)
            ->with('user')->get();
        $type = 'Advertiser';
        return view('backend.user-list', compact('infos', 'type', 'for'));
    }
}
