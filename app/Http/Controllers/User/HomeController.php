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
        $cities = City::whereIn('name', ['Ouarzazate', 'Chefchaouen', 'Marrakech', 'Agadir'])->get();
        $activities = Activity::where('status','1')->latest()->paginate(12);
        return view('welcome', compact('activities','destinations','experiences','cities'));
    }

    public function details(Activity $activity)
    {
        $experiences = Category::all();
        $destinations = City::all();
        return view('user.Activity.details', compact('activity','destinations','experiences'));
    }


    public function search(Request $request){

        $title = $request->query('title');
        $category = $request->query('category');
        $from = $request->query('from');
        $to = $request->query('to');


        $activities = Activity::query();

        if ($title) {
            $activities->where('name', 'like', '%' . $title . '%');
            }

        if ($category) {
                $activities->whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category);
                });
            }

            if ($from && $to) {
                $activities->whereBetween('date', [$from, $to]);
            }    
            $activities= $activities->get();
        return $activities;
    }


}
