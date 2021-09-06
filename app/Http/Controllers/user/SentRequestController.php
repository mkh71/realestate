<?php

namespace App\Http\Controllers\user;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Package;
use App\Service;
use App\Tour;
use App\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SentRequestController extends Controller
{
    public function tour_requ(Request $request){
        $val = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'date'=>'required',
            'time'=>'required'
        ]);
        if ($val->fails()) return redirect()->back()->with('error', 'Validation Failed');
        $data = $request->except('date', 'time');
        $date = date('Y-m-d', strtotime($request->date));
        $time = date('h:i:s', strtotime($request->time));
        $data['schedule'] = $date.' '.$time;
        $data['status'] = 0;
        Tour::query()->create($data);
        return redirect()->back()
            ->with('success', 'Your tour request is sent to the owner. They will confirm about your tour schedule');
    }

    public function booking(Request $request){
        $val = Validator::make($request->all(), [
            'date'=>'required',
            'checkbox'=>'accepted',
        ]);
        if ($val->fails()) return redirect()->back()->with('error', 'Validation Failed');

        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['property_id'] = $request->property_id;
        $data['for'] = $request->for;
        $data['date'] = date('Y-m-d', strtotime($request->date));
        $data['status'] = 0;
        Booking::query()->create($data);
        return redirect(route('home'))
            ->with('success', 'Your request in being processed. Please wait for the response.');
    }

    public function checkout_pack($id){
        $info = Package::query()->find($id);
        $type = 'Package';
        return view('website.checkout',compact('info', 'type'));
    }
    public function checkout_service($id){
        $info = Service::query()->find($id);
        $type = 'Service';
        return view('website.checkout',compact('info', 'type'));
    }

}
