<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalActivities = Activity::count();
        $totalUsers = User::count();
        $totalReservation = Reservation::count();

        $categories = Category::paginate(8);
        $countCat = Category::count();
        return view ('admin.category.index', compact('categories','countCat','totalActivities','totalUsers','totalReservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories')],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $category = Category::create($validatedData);
        $category->addMediaFromRequest('image')->toMediaCollection('categories');

        return redirect()->route('admin.categories.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $category->update($validatedData);

        if ($request->hasFile('image')) {
            $category->clearMediaCollection('images');
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
        }
        return redirect()->route('admin.categories.index')->with('success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category deleted successfully.');
    }

    
}
