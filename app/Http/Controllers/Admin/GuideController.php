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
        })->get();
        
        return view ('admin.guide.index', compact('guides'));
    }

    public function create(){
        $cities = City::all();
        return view ('admin.guide.create',compact('cities'));
    }
    public function show(User $guide){
        return view ('admin.guide.show',compact('guide'));
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

    public function blockUser($guideId)
    {
        $user = User::findOrFail($guideId);
        $user->status = 0;
        $user->save();

        return redirect()->back()->with('success', 'User blocked successfully.');
    }

    public function unblockUser($guideId)
    {
        $user = User::findOrFail($guideId);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'User unblocked successfully.');
    }

    
}
