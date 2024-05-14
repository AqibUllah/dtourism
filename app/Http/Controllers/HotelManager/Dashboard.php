<?php

namespace App\Http\Controllers\HotelManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{

    public function index()
    {
        return view('hotel_manager.dashboard');
    }
}
