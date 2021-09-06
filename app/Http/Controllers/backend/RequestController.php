<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\UserPackage;
use App\UserService;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function service_requ($status){
        $infos= UserService::query()->where('status', $status)->get();
        return view('backend.service.request', compact('infos','status'));
    }

    public function accept_service(Request $request){
        $data = UserService::query()->find($request->id);
        $data->update(['status'=>1, 'admin_note'=>$request->admin_note, 'price'=>$request->price]);
        return redirect()->back()->with('success', 'Request Accepted');
    }
    public function deny_service(Request $request){
        $data = UserService::query()->find($request->id);
        $data->update(['status'=>3, 'admin_note'=>$request->admin_note]);
        return redirect()->back()->with('success', 'Request Denied');
    }
     public function complete_service($id){
         $info = UserService::query()->find($id);
         $data['status'] = 2;
         $data['updated_at'] = date('Y-m-d H:i:s ');
         $info->update($data);
         return redirect()->back()->with('success', 'Service is Completed');
     }

     public function package_requ($status){
         $infos= UserPackage::query()->where('status', $status)->get();
         return view('backend.package.request', compact('infos','status'));
     }
      public function pack_off($id){
          $info = UserPackage::query()->find($id);
          $now = date('Y-m-d H:i:s ');

          $data['expire_at'] = $now;
          $data['status'] = 2;
          $data['updated_at'] = $now;
          $info->update($data);
          return redirect()->back()->with('success', 'Package Status updated');
     }

}
