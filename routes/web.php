<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// book parking
Route::group(['prefix' => 'parking', 'as' => 'book-parking.', 'middleware' => ['role:student|admin']], function (){
    Route::get('/index', [BookingController::class, 'index'])
        ->name('index');
    Route::get('/current', [BookingController::class, 'getCurrent'])
        ->name('current');
    Route::get('/previous', [BookingController::class, 'getPrevious'])
        ->name('previous');
    Route::get('/show/{booking_id}', [BookingController::class, 'show'])
        ->name('show');

    Route::post('/book', [BookingController::class, 'book'])
        ->name('book');
    Route::post('/get-booking-date', [BookingController::class, 'getBookingDate'])
        ->name('get-booking-date');
    Route::post('/finished/{booking_id}', [BookingController::class, 'setFinished'])
        ->name('set-finished');
    Route::post('/cancel/{booking_id}', [BookingController::class, 'setCancel'])
        ->name('set-cancel');
    Route::get('/delete/{booking_id}', [BookingController::class, 'destroy'])
        ->name('delete');
});

Route::group(['prefix' => 'manage-user', 'as' => 'manage-user.', 'middleware' => ['role:admin']], function () {
    Route::get('/index', [ManageUserController::class, 'index'])
        ->name('index');

    Route::get('/show/{user_id}', [ManageUserController::class, 'show'])
        ->name('show');
    Route::get('/create', [ManageUserController::class, 'create'])
        ->name('create');
    Route::get('/edit/{user_id}', [ManageUserController::class, 'edit'])
        ->name('edit');
    Route::get('/delete/{user_id}', [ManageUserController::class, 'destroy'])
        ->name('destroy');

    Route::post('/store', [ManageUserController::class, 'store'])
        ->name('store');
    Route::post('/update/{user_id}', [ManageUserController::class, 'update'])
        ->name('update');
});

// dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['role:student|admin']], function() {
    Route::get('/index', [DashboardController::class, 'index'])
        ->name('index');
});

require __DIR__.'/auth.php';
