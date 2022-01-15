<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);

        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'matricID' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'carPlate' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        Auth::login($user = User::create([
            'fullName' => $request->fullName,
            'matricID' => $request->matricID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_type' => RoleType::STUDENT,
        ]));

        $car = Car::create([
            'user_id' => Auth::id(),
            'carPlate' => $request->carPlate,
            'snPicture' => 'none'
        ]);

        $user->assignRole('student');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
