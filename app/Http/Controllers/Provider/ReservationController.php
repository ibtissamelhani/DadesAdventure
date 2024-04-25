<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){

        $activities =  Auth::user()->providedActivities()->where('status', 1)->paginate(9);
        return view('Provider.reservation.index',compact('activities'));

    }

    public function show($id){
        $activity = Activity::findOrFail($id);
        $reservations = $activity->reservations()->paginate(10);
        
        return view('Provider.reservation.show',compact('reservations','activity'));
    }
}
