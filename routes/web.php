<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('test');
});
Route::get('/test',[HomeController::class,'index']);

Route::get('/home', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);

// authentication

Route::name('login.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/auth', [LoginController::class, 'customLogin'])->name('auth');
});


// register
Route::get('/register',[RegisterController::class, 'index']);
