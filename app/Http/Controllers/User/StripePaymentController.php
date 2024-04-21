<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

use Session;
use Stripe;
class StripePaymentController extends Controller
{
    public function stripe(Activity $activity){
        $experiences = Category::all();
        $destinations = City::all();
        return view('User.reservation.payement',compact('activity','experiences','destinations'));
    }

    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount'=>100*100,
            'currency'=>"usd",
            'source'=>$request->stripe->token
        ]);
        Session::flash('success','payment has been successfully');
        return back();
    }
}
