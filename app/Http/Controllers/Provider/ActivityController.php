<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
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
        
        $validatedData = $request->validated();
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName); 
        $validatedData['image'] = 'images/' . $imageName;
    }

    $activity = Activity::create($validatedData);

    return redirect()->route('provider.activity.index')->with('success', 'Activity created successfully!');

    }
}
