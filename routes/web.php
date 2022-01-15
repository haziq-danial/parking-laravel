<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
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

require __DIR__.'/auth.php';
