<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
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
});

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
});

Route::get('register', [RegisterController::class, 'create'])
->name('register');

Route::post('register', [RegisterController::class, 'store']);


Route::prefix('admin')->name('admin.')->group(function() {
    
Route::resource('/categories', CategoryController::class);

Route::resource('/cities', CityController::class);

Route::resource('/types', TypeController::class);

Route::resource('/places', PlaceController::class);

Route::resource('/users', UserController::class);

Route::put('/users/{userId}/block', [UserController::class, 'blockUser'])->name('users.block');
Route::put('/users/{userId}/unblock', [UserController::class, 'unblockUser'])->name('users.unblock');

});