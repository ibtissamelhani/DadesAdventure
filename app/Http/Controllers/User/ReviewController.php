<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $review = Review::create($validatedData);
        return redirect()->route('home')->with('success','review added successfully.');
    }
}
