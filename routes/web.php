<?php

use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Provider\ActivityController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->name('dashboard');


/**
     * Auth routes
     *//////////////////////////////////////////////////////////////////

Route::get('register', [RegisterController::class, 'create'])
->name('register');

Route::get('login', [AuthenticationController::class, 'create'])
->name('login');

Route::post('register', [RegisterController::class, 'store']);

Route::post('login', [AuthenticationController::class, 'store']);

Route::post('logout', [AuthenticationController::class, 'destroy'])
                ->name('logout');

////////////////////////////////////////////////////////////////////////


Route::prefix('admin')->name('admin.')->group(function() {

Route::resource('/categories', CategoryController::class);

Route::resource('/cities', CityController::class);

Route::resource('/types', TypeController::class);

Route::resource('/places', PlaceController::class);

Route::resource('/users', UserController::class);

Route::resource('/activities', AdminActivityController::class);
Route::post('/activities/publish/{activity}', [AdminActivityController::class, 'publishActivity'])->name('activity.publish');


Route::put('/users/{userId}/block', [UserController::class, 'blockUser'])->name('users.block');
Route::put('/users/{userId}/unblock', [UserController::class, 'unblockUser'])->name('users.unblock');

});

//////////////////////////////////////////////////////////////////////////

Route::prefix('provider')->name('provider.')->group(function(){
    
    Route::get('/dashboard', function () {
        return view('Provider.dashboard');
    })->name('dashboard');
    
    Route::get('/activities/search', [ActivityController::class, 'search'])->name('activities.search');

    Route::resource('/activities', ActivityController::class);


});