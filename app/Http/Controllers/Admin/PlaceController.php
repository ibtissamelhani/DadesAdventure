<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Activity;
use App\Models\City;
use App\Models\Place;
use App\Models\Reservation;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();
        
        $places = Place::with('city','type')->paginate(8);
        $countPlaces = Place::count();
        $cities = City::all();
        $types = Type::all();
        return view ('admin.place.index', compact('places','types','cities','countPlaces','totalActivities','totalUsers','totalReservation'));
    }

    public function edit(Place $place)
    {

        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        $countPlaces = Place::count();
        $cities = City::all();
        $types = Type::all();
        return view('admin.place.edit', compact('place','cities','types','countPlaces','totalActivities','totalUsers','totalReservation'));
    }

    public function store(StorePlaceRequest $request)
    {
        $place = Place::create($request->all());
        return redirect()->route('admin.places.index')->with('success','Place created successfully.');
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place->update($request->all());
        return redirect()->route('admin.places.index')->with('success','Place updated successfully.');
    }

    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->route('admin.places.index')->with('success','place deleted successfully.');
    }
}
