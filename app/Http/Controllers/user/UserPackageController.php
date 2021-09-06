<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Package;
use App\UserPackage;
use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function checkout_pack($id){
        $info = Package::query()->find($id);
        $type = 'Package';
        return view('website.checkout',compact('info', 'type'));
    }

}
