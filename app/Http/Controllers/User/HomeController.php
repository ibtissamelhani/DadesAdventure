<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\City;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $experiences = Category::all();

        $destinations = City::all();

        $reviews = Review::all();

        $topCities = City::leftJoin(DB::raw('(SELECT places.city_id, COUNT(places.id) AS places_count
            FROM places
            LEFT JOIN activities ON places.id = activities.place_id
            GROUP BY places.city_id) AS place_counts'), 'cities.id', '=', 'place_counts.city_id')
            ->select('cities.*', 'place_counts.places_count')
            ->orderByDesc('place_counts.places_count')
            ->take(4)
            ->get();

        $activities = Activity::where('status','1') ->whereDate('date', '>=', Carbon::today())->latest()->paginate(12);

        return view('welcome', compact('activities','destinations','experiences','topCities','reviews'));
    }

    public function details(Activity $activity)
    {
        $experiences = Category::all();
        $destinations = City::all();

        $reviews = Review::all();

        return view('user.Activity.details', compact('activity','destinations','experiences','reviews'));
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
            foreach ($activities as $activity) {
                $activity['image'] = $activity->getFirstMediaUrl('images');
            }
        return response()->json($activities)->header('Content-Type', 'application/json');
    }


}
