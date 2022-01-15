<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }


    public function store(Request $request)
    {
//        $request->validate([
//            'firstname' => 'required|string|max:255',
//            'lastname' => 'required|string|max:255',
//            'password' => 'required|string|confirmed|min:8',
//            'confirm_password' => 'required|string|confirmed|min:8',
//            'id_no' => 'required|string|max:255',
//        ]);

//        Auth::login($user = Fkusers::create([
//            'firstname' => $request->firstname,
//            'lastname' => $request->lastname,
//            'username' => $request->username,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//        ]));
//        dd($request->fullName);
        Auth::login($user = User::create([
            'fullName' => $request->fullName,
            'matricID' => $request->matricID,
            'email' => $request->email,
            'carPlate' => $request->carPlate,
            'snPicture' => 'none',
            'password' => Hash::make($request->password)
        ]));
        return redirect()->route('home');
    }
}
