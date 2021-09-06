<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Property;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_profile($id){
        $user = User::query()->find($id);
        return view('backend.profile.user-profile', compact('user'));
    }

    public function advertiser_list(){
        $ids = myActiveProperties();
        $infos = Property::query()
            ->whereIn('id', $ids)
            ->with('user')->get();
        $type = 'Advertiser';
        return view('backend.user-list', compact('infos', 'type', 'for'));
    }
}
