<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // get today date
        $today = date('d/m/Y');

        // get bookings where date is today
        $bookings = get_bookings($today);
        // display bookings
//        dd($bookings);
        return view('dashboard.index', [
            'bookings' => $bookings
        ]);
    }
}
