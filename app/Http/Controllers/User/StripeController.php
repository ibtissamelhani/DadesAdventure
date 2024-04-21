<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $activity = Activity::findOrFail($request->activity_id);
        $totalPrice = $activity->price * $request->number_of_places;

        $unitAmount = max(100, $totalPrice);
        

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => 'Activty Ticket',
                        ],
                        'unit_amount'  => $unitAmount,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('user.success', ['activity_id' => $request->activity_id,'totalPrice' => $totalPrice,'number_of_places' => $request->number_of_places,]), 
        ]);

        return redirect()->to($session->url);
    }


    public function success(Request $request)
    {
        $activity = Activity::findOrFail($request->activity_id);
        
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'activity_id' => $request->activity_id,
            'nbr_place' => $request->number_of_places,
            'amount' => $request->totalPrice,
        ]);
        return redirect()->route('details', $activity)->with('status', 'Booking Tickets Successfully!Check Your Email');
    }
}
