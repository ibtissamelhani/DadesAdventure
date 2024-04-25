<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRequest;
use App\Mail\CreateProfileMail;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = User::whereHas('roles', function ($query) {
            $query->where('name', 'provider');
        })->paginate(8);
        
        return view ('admin.provider.index', compact('providers'));
    }


    public function create(){
        $cities = City::all();
        return view ('admin.provider.create',compact('cities'));
    }


    public function show(User $provider){
        return view ('admin.provider.show',compact('provider'));
    }


    public function store(StoreProviderRequest $request){
        $password = Str::random(8);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'password' => Hash::make($password),
        ]);

        $user->roles()->attach(4);
        $user->addMediaFromRequest('profile')->toMediaCollection('profiles');

        Mail::to($user->email)->send(new CreateProfileMail($user,$password));

        return redirect()->route('admin.providers.index')->with('success', 'Provider added successfully.');;
    }

    public function blockUser($providerId)
    {
        $user = User::findOrFail($providerId);
        $user->status = 0;
        $user->save();

        return redirect()->back()->with('success', 'Provider blocked successfully.');
    }

    public function unblockUser($providerId)
    {
        $user = User::findOrFail($providerId);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'Provider unblocked successfully.');
    }

    public function searchProbider(Request $request)
    {
        $searchItem = $request->query('searchItem');

        $providers = User::with('city')
        ->whereHas('roles', function($query) {
            $query->where('name', 'provider');
        });
       

        if ($searchItem) {
        $providers->where(function ($query) use ($searchItem) {
            $query->where('first_name', 'like', '%' . $searchItem . '%')
                  ->orWhere('last_name', 'like', '%' . $searchItem . '%')
                  ->orWhereHas('city', function ($query) use ($searchItem) {
                      $query->where('name', 'like', '%' . $searchItem . '%');
                  });
        });
        }
        $providers = $providers->get();

        
        foreach ($providers as $provider) {
            $provider['profile'] = $provider->getFirstMediaUrl('profiles');
        }

        return response()->json($providers)->header('Content-Type', 'application/json');
    }
}
