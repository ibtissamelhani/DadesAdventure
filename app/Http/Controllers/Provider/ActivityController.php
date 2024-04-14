<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $proActivities = Auth::user()->providedActivities()->get();
        return view('Provider.activity.index', compact('proActivities'));
    }

    public function show(Activity $activity)
    {
        return view('Provider.activity.show',compact('activity'));
    }

    public function create()
    {
        $categories = Category::all();
        $guides = User::whereHas('roles', function ($query) {
            $query->where('name', 'guide');
        })->get();
        $places = Place::all();
        return view('Provider.activity.create', compact('categories','guides','places'));
    }

    public function store(StoreActivityRequest $request)
    {

    $activity = Activity::create($request->all());
    $activity->addMediaFromRequest('image')->toMediaCollection('images');

    return redirect()->route('provider.activities.index')->with('success', 'Activity created successfully!');
    }



    public function edit(Activity $activity)
    {
         $categories = Category::all();
        $guides = User::whereHas('roles', function ($query) {
            $query->where('name', 'guide');
        })->get();
        $places = Place::all();
        return view('Provider.activity.edit', compact('activity','categories','guides','places'));
    }


    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->all());
        if ($request->hasFile('image')) {
            $activity->clearMediaCollection('images');
            $activity->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('provider.activities.index')->with('success', 'Activity updated successfully.');
    }


    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('provider.activities.index')
            ->with('success', 'Activity deleted successfully.');
    }
}
