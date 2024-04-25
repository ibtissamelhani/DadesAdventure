<?php

use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Provider\ActivityController;
use App\Http\Controllers\Provider\ReservationController as ProviderReservationController;
use App\Http\Controllers\User\AboutUsController;
use App\Http\Controllers\User\ActivityController as UserActivityController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripePaymentController;
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




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/details/{activity}', [HomeController::class, 'details'])->name('details');


Route::get('/AboutUs', [AboutUsController::class, 'showAboutPage'])->name('about');


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/test-email', [ContactController::class, 'testEmail']);

Route::get('/activities-by-city/{id}', [UserActivityController::class, 'getActivitiesByCity'])->name('activities.by.city');
Route::get('/activities-by-category/{id}', [UserActivityController::class, 'getActivitiesByCategory'])->name('activities.by.category');

/**
     * Auth routes
     *///////////////////////////////////////////////////////////////////////////////////////////

     Route::middleware('guest')->group(function () {

        Route::get('register', [RegisterController::class, 'create'])
        ->name('register');
    
        Route::get('login', [AuthenticationController::class, 'create'])
        ->name('login');
    
        Route::post('register', [RegisterController::class, 'store']);
    
        Route::post('login', [AuthenticationController::class, 'store']);
     });


Route::post('logout', [AuthenticationController::class, 'destroy'])
                ->name('logout')->middleware(['auth']);


////////////////////////////////////////////////////////////////////////////////////////////////


Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function() {

Route::resource('/categories', CategoryController::class);

Route::resource('/cities', CityController::class);

Route::resource('/types', TypeController::class);

Route::resource('/places', PlaceController::class);

Route::resource('/users', UserController::class);

Route::resource('/activities', AdminActivityController::class);
Route::post('/activities/publish/{activity}', [AdminActivityController::class, 'publishActivity'])->name('activity.publish');


Route::put('/users/{userId}/block', [UserController::class, 'blockUser'])->name('users.block');
Route::put('/users/{userId}/unblock', [UserController::class, 'unblockUser'])->name('users.unblock');


Route::resource('/guides', GuideController::class);
Route::put('/guides/{guideId}/block', [GuideController::class, 'blockUser'])->name('guide.block');
Route::put('/guides/{guideId}/unblock', [GuideController::class, 'unblockUser'])->name('guide.unblock');
Route::get('/search', [GuideController::class, 'search'])->name('search');


Route::resource('/providers', ProviderController::class);
Route::put('/providers/{providerId}/block', [ProviderController::class, 'blockUser'])->name('provider.block');
Route::put('/providers/{providerId}/unblock', [ProviderController::class, 'unblockUser'])->name('provider.unblock');
Route::get('/searchProbider', [ProviderController::class, 'searchProbider'])->name('searchProbider');


Route::get('/dashboard', [UserController::class, 'getDashboard'])->name('dashboard');


});

/////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('provider')->name('provider.')->middleware(['auth','provider'])->group(function(){
    
    Route::get('/dashboard', function () {
        return view('Provider.dashboard');
    })->name('dashboard');
    
    Route::get('/activities/search', [ActivityController::class, 'search'])->name('activities.search');

    Route::resource('/activities', ActivityController::class);
    
    Route::get('/reservations', [ProviderReservationController::class,'index'])->name('reservations');

    Route::get('/reservations/{id}', [ProviderReservationController::class,'show'])->name('getreservations');


});


///////////////////////////////////////////////////////////////////////////////////////////////////


Route::prefix('user')->name('user.')->middleware(['auth'])->group(function(){

    Route::get('/reservation/{activity}', [ReservationController::class, 'showReservation'])->name('reservation');
    Route::post('/session', 'App\Http\Controllers\User\StripeController@session')->name('session');
    Route::get('/success', 'App\Http\Controllers\User\StripeController@success')->name('success');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::resource('/reviews',ReviewController::class);

});

///////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth']);
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware(['auth']);
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware(['auth']);



Route::get('/searchActivity', [HomeController::class, 'search'])->name('searchActivity');
