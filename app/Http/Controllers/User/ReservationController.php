<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    
    public function showReservation(Activity $activity){
        $experiences = Category::all();
        $destinations = City::all();
        return view('User.reservation.reservation',compact('activity','experiences','destinations'));
    }

    
}
