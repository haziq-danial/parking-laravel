<?php

namespace App\Http\Controllers;

use App\Classes\Constants\RoleType;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{

    public function index()
    {
        // get all user
        $users = User::with('car')
            ->get();

        $count = 1;
        return view('manage-user.index', [
            'users' => $users,
            'count' => $count
        ]);
    }


    public function create()
    {
        return view('manage-user.create');
    }


    public function store(Request $request)
    {
        $user = User::create([
            'fullName' => $request->fullName,
            'matricID' => $request->matricID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_type' => $request->role_type,
        ]);

        $car = Car::create([
            'user_id' => $user->user_id,
            'carPlate' => $request->carPlate,
            'snPicture' => 'none'
        ]);

        switch ($request->role_type) {
            case RoleType::STUDENT:
                $user->assignRole('student');
                break;
            case RoleType::ADMIN:
                $user->assignRole('admin');
                break;
        }

        return redirect()->route('manage-user.index');
    }

    public function show($user_id)
    {
        // get user based on user id
        $user = User::find($user_id);

        return view('manage-user.show',[
            'user' => $user
        ]);
    }


    public function edit($user_id)
    {
        // get user based on user id
        $user = User::find($user_id);

        return view('manage-user.edit',[
            'user' => $user
        ]);
    }


    public function update(Request $request, $user_id)
    {
        $user = User::with('car')->find($user_id);
        $car = $user->car;

        $user->fullName = $request->fullName;
        $user->matricID = $request->matricID;
        $user->email = $request->email;
        $car->carPlate = $request->carPlate;
        $user->update();
        $car->update();

        return redirect()->route('manage-user.index');
    }


    public function destroy($user_id)
    {
        $user = User::with('car')->find($user_id);
        $car = $user->car;

        $user->destroy($user->user_id);
        $car->destroy($car->car_id);

        return redirect()->route('manage-user.index');
    }
}
