<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservation(Activity $activity){
        return view('User.reservation.reservation',compact('activity'));
    }
}
