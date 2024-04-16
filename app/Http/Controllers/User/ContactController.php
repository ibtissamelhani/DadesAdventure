<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        

        Mail::to('4e74023503180a@inbox.mailtrap.io')->send(new ContactFormMail($validatedData));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

}
