<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $experiences = Category::all();
        $destinations = City::all();
        $activities = Activity::where('status','1')->paginate(12);
        return view('welcome', compact('activities','destinations','experiences'));
    }

    public function details(Activity $activity)
    {
        return view('user.Activity.details', compact('activity'));
    }


}
