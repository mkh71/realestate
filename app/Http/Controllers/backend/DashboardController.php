<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'checkAdmin']);
    }

    public function dashboard(){
        if(type() != 1)
            return redirect(route('home'));

        return view('backend.dashboard');
    }
}
