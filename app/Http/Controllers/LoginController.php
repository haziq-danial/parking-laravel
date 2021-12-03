<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function customLogin(Request $request)
    {
        $credentials = $request->only('matricID','password');
        if (Auth::attempt($credentials)) {
            return view('home');
        }
    }
}
