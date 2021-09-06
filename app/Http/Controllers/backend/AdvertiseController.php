<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function advt_requ(Request $request){
        $for = $request->for;
        $status = $request->status;
        $infos = Property::query()
            ->where('status', $status)
            ->where('for', $for)
            ->get();
        return view('backend.advertise.index', compact('infos', 'for', 'status'));
    }

    public function accept_advertise($id){
        $data = Property::query()->find($id);
        $package = $data->user_package;
        if ($package){
            $Upack['active_at'] = date('Y-m-d h:i:s');
            $Upack['expire_at'] = $Upack['active_at']+$package->package->day;
            $Upack['item'] = $package->item+1;

            if ($Upack['item'] == $package->package->item){
                $Upack['stuts'] = 0;
                $Upack['property_ids'] = $id;
            }
            $package->update($Upack);
            $expire_at = $package->expire_at;
        }else $expire_at =null;
        $info['status'] = 1;
        $info['advertising_close'] = $expire_at;

        $data->update($info);
        return redirect()->back()->with('success', 'Advertise request has been accepted successfully');
    }
}
