<?php

namespace App\Http\Controllers;

use App\Classes\Constants\BookingStatus;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('parking.index');
    }

    public function book(Request $request)
    {
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'date_booking' => $request->date_booking,
            'start_time' => $request->start_time,
            'parking_duration' => $request->parking_duration,
            'parking_slot' => $request->parking_slot,
            'status' => BookingStatus::ONGOING
        ]);

        return redirect()->route('book-parking.current');
    }

    public function getBookingDate(Request $request)
    {
        $bookings = Booking::where('date_booking', $request->date_booking)
            ->where('status', BookingStatus::ONGOING)
            ->get();
//        dd($bookings->toJson());

        return view('parking.index', [
            'date_booking' => $request->date_booking,
            'bookings' => $bookings,
        ]);
    }

    public function show($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('parking.show', [
            'booking' => $booking
        ]);
    }

    public function getCurrent()
    {
        $booking = Booking::where('user_id', Auth::id())
            ->where('status', BookingStatus::ONGOING)
            ->first();

        return view('parking.currentBooking', [
            'booking' => $booking
        ]);
    }

    public function getPrevious()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->where('status', BookingStatus::FINISHED)
            ->orWhere('status', BookingStatus::CANCELED)
            ->get();
        $count = 0;

        return view('parking.previousBooking', [
            'bookings' => $bookings,
            'count' => $count
        ]);
    }

    public function setFinished($booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->status = BookingStatus::FINISHED;
        $booking->save();

        return redirect()->route('book-parking.previous');
    }

    public function setCancel($booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->status = BookingStatus::CANCELED;
        $booking->save();

        return redirect()->route('book-parking.previous');
    }

    public function destroy($booking_id)
    {
        $booking = Booking::destroy($booking_id);
        return redirect()->route('book-parking.previous');
    }

}
