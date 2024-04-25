<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        $usersCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->where('status', 1)->count();
        return view ('admin.user.index', compact('users','usersCount','totalActivities','totalUsers','totalReservation'));
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

    public function getDashboard(){
        $pendingActivities = Activity::where('status',0)->count();
        $publishedActivities = Activity::where('status',1)->count();

        $user = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->count();
        $guide = User::whereHas('roles', function ($query) {
            $query->where('name', 'guide');
        })->count();
        $provider = User::whereHas('roles', function ($query) {
            $query->where('name', 'provider');
        })->count();

        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        return view('Admin.dashboard', compact('pendingActivities','publishedActivities','provider','guide','user','totalActivities','totalUsers','totalReservation'));
    }
}
