<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        $usersCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->where('status', 1)->count();
        return view ('admin.user.index', compact('users','usersCount'));
    }


    // block user
    public function blockUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 0;
        $user->save();

        return redirect()->back()->with('success', 'User blocked successfully.');
    }

    public function unblockUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User unblocked successfully.');
    }
}
