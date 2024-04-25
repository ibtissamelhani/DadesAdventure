<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function getActivitiesByCity($id){

        $city = City::findOrFail($id);
        $activities = Activity::whereIn('place_id', $city->places()->pluck('id'))->paginate(9);

        $experiences = Category::all();
        $destinations = City::all();
        return view('ActivitiesByCity',compact('experiences','destinations','activities','city'));
    }

    public function getActivitiesByCategory($id){

        $category = Category::findOrFail($id);
        $activities = $category->activities()->latest()->paginate(10);;

        $experiences = Category::all();
        $destinations = City::all();
        return view('ActivitiesBycategory',compact('experiences','destinations','activities','category'));
    }
}
