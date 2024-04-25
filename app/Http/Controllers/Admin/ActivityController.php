<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {

        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        $pendingActivities = Activity::where('status','=', '0')->latest()->paginate(6);
        $Activities = Activity::where('status','=', '1')->latest()->paginate(8);
        return view('Admin.Activity.index', compact('pendingActivities','Activities','totalActivities','totalUsers','totalReservation'));
    }

    public function show(Activity $activity)
    {
        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();
        return view('Admin.Activity.show',compact('activity','totalActivities','totalUsers','totalReservation'));
    }

    public function publishActivity(Activity $activity)
    {
        try {
            $activity->update(['status' => 1]);

            return redirect()->route('admin.activities.index')->with('success', 'Activity published successfully.');
        } catch (\Exception $e) {

            return redirect()->route('admin.activities.index')->with('error', 'Failed to publish activity.');
        }
    }

    public function destroy(Activity $activity)
    {
            try {
                    $activity->delete();
                return redirect()->route('admin.activities.index')
                ->with('success', 'Activity deleted successfully.');
            } catch (\Exception $e) {
                    return redirect()->route('admin.activities.index')->with('error', 'Failed to delete activity.');
                }
    }


}
