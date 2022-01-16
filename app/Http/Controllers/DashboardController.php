<?php

namespace App\Http\Controllers;

use App\Classes\Constants\BookingStatus;
use App\Models\Booking;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = User::find(Auth::id());
        // get today date
        $date = date('m/d/Y', strtotime('+2 day'));

        // get bookings where date is today
        $bookings = get_bookings($date);

        // get current booking
        $booking = Booking::where('user_id', Auth::id())
            ->with('user','car')
            ->where('status', BookingStatus::ONGOING)
            ->first();

        // display bookings
//        dd($bookings);
        return view('dashboard.index', [
            'bookings' => $bookings,
            'booking' => $booking,
            'date' => $date,
            'user' => $user
        ]);
    }
}
