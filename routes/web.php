<?php

use Illuminate\Support\Facades\Route;

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
    return view('lib.blank');
});
Route::get('/test','App\Http\Controllers\HomeController@test');

Route::get('/home', 'App\Http\Controllers\HomeController@home');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard');
