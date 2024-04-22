<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $experiences = Category::all();
        $destinations = City::all();
        return view('Auth.register',compact('destinations','experiences'));
    }


    public function store(RegisterRequest $request){

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(2);
        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('home');
    }
    


}
