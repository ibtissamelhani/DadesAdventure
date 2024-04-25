<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\City;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index()
    {

        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        $cities = City::paginate(8);
        $countCity = City::count();
        return view ('admin.city.index', compact('cities','countCity','totalActivities','totalUsers','totalReservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('cities')],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $city = City::create($validatedData);
        $city->addMediaFromRequest('image')->toMediaCollection('cities');

        return redirect()->route('admin.cities.index')->with('success','City created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countCity = City::count();
        return view('admin.city.edit', compact('city','countCity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $city->update($validatedData);

        if ($request->hasFile('image')) {
            $city->clearMediaCollection('images');
            $city->addMediaFromRequest('image')->toMediaCollection('cities');
        }
        return redirect()->route('admin.cities.index')->with('success','City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success','City deleted successfully.');
    }
}
