<?php

namespace App\Http\Controllers\common;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

}
