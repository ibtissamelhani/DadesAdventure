<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = [];

        $userId = Auth::user()->id;
        $reservations = Reservation::with(['user', 'activity'])->where('user_id', $userId)->get();

        foreach ($reservations as $reservation) {
            
            $bookings[] = [
                'title' =>' ---- '.$reservation->activity->category->name.' ---- '.$reservation->activity->name. ' city: ' .$reservation->activity->place->city->name,
                'start' => $reservation->activity->date, 
                'end' => $reservation->activity->date, 
                'id'   => $reservation->id
            ];
            }
            return view('User.reservation.bookings',compact('bookings'));
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('User.reservation.show',compact('reservation'));
    }
}