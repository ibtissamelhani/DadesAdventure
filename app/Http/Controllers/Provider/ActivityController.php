<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $proActivities = Auth::user()->providedActivities()->get();
        return view('Provider.activity.index', compact('proActivities'));
    }
}
