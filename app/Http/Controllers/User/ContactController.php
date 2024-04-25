<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        $experiences = Category::all();
        $destinations = City::all();
        return view('contact', compact('experiences','destinations'));
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        

        Mail::to('admin@gmail.com')->send(new ContactFormMail($validatedData));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

}
