<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg'],
        ]);

        $request->user()->fill($validatedData);

        $request->user()->save();
        if ($request->hasFile('image')) {
            $request->user()->clearMediaCollection('profiles');
            $request->user()->addMediaFromRequest('image')->toMediaCollection('profiles');
        }
        

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
