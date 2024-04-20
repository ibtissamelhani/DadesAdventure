<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function showAboutPage()
    {
        $experiences = Category::all();
        $destinations = City::all();
        return view('about', compact('experiences','destinations'));
    }
}
