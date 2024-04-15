<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $pendingActivities = Activity::where('status','=', '0')->latest()->paginate(6);
        $Activities = Activity::paginate(8);
        return view('Admin.Activity.index', compact('pendingActivities','Activities'));
    }

    public function show(Activity $activity)
    {
        return view('Admin.Activity.show',compact('activity'));
    }

    public function publishActivity(Activity $activity)
    {
        $activity->update(['status'=> 1]);
        return redirect()->route('admin.activities.index');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')
            ->with('success', 'Activity deleted successfully.');
    }


}
