<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuideRequest;
use App\Mail\CreateProfileMail;
use App\Models\Activity;
use App\Models\City;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GuideController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();
        
        $guides = User::whereHas('roles', function ($query) {
            $query->where('name', 'guide');
        })->paginate(8);
        
        return view ('admin.guide.index', compact('guides','totalActivities','totalUsers','totalReservation'));
    }

    public function create(){
        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        $cities = City::all();
        return view ('admin.guide.create',compact('cities','totalActivities','totalUsers','totalReservation'));
    }
    public function show(User $guide){
        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();
        return view ('admin.guide.show',compact('guide','totalActivities','totalUsers','totalReservation'));
    }

    public function store(StoreGuideRequest $request){

        $password = Str::random(8);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'spoken_languages' => implode(',', $request->spoken_languages),
            'password' => Hash::make($password),
        ]);

        $user->roles()->attach(3);
        $user->addMediaFromRequest('profile')->toMediaCollection('profiles');
        Mail::to($user->email)->send(new CreateProfileMail($user,$password));

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

    public function search(Request $request)
    {
        $searchItem = $request->query('searchItem');

        $guides = User::with('city')
        ->whereHas('roles', function($query) {
            $query->where('name', 'guide');
        });
       

        if ($searchItem) {
        $guides->where(function ($query) use ($searchItem) {
            $query->where('first_name', 'like', '%' . $searchItem . '%')
                  ->orWhere('last_name', 'like', '%' . $searchItem . '%')
                  ->orWhereHas('city', function ($query) use ($searchItem) {
                      $query->where('name', 'like', '%' . $searchItem . '%');
                  });
        });
        }
        $guides = $guides->get();

        
        foreach ($guides as $guide) {
            $guide['profile'] = $guide->getFirstMediaUrl('profiles');
        }

        return response()->json($guides)->header('Content-Type', 'application/json');
    }
}
