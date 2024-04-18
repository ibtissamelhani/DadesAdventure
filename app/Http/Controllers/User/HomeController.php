<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::where('status','1')->paginate(12);
        return view('welcome', compact('activities'));
    }

    public function details(Activity $activity)
    {
        return view('Activity.details', compact('activity'));
    }


}
