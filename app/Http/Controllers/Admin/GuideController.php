<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = User::whereHas('roles', function ($query) {
            $query->where('name', 'guide');
        })->get();
        // $usersCount = User::whereHas('roles', function ($query) {
        //     $query->where('name', 'guide');
        // })->where('status', 1)->count();
        return view ('admin.guide.index', compact('guides'));
    }
}
