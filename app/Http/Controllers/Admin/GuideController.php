<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuideRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuideController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = User::whereHas('roles', function ($query) {
            $query->where('name', 'guide');
        })->where('status', 1)->get();
        
        return view ('admin.guide.index', compact('guides'));
    }

    public function create(){
        $cities = City::all();
        return view ('admin.guide.create',compact('cities'));
    }

    public function store(StoreGuideRequest $request){

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'spoken_languages' => implode(',', $request->spoken_languages),
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(3);
        $user->addMediaFromRequest('profile')->toMediaCollection('profiles');

        return redirect()->route('admin.guides.index')->with('success', 'Guide added successfully.');;
    }
}
