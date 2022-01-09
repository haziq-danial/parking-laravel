<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //open parking
    public function openParking()
    {

    }

    public function index()
    {
        return view('parking.index');
    }

    public function book(Request $request)
    {
        $booking = Booking::create([
            'user_id' => 0,
            'date_booking' => $request->date_booking,
            'start_time' => $request->start_time,
            'parking_duration' => $request->parking_duration,
            'parking_slot' => $request->parking_slot
        ]);

        return redirect()->route('book-parking.index');
    }

    public function getBookingDate(Request $request)
    {
        $bookings = Booking::where('date_booking', $request->date_booking)->get();
//        dd($bookings->toJson());

        return view('parking.index', [
            'date_booking' => $request->date_booking,
            'bookings' => $bookings,
        ]);
    }

}
