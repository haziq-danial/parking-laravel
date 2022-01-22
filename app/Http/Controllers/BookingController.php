<?php

namespace App\Http\Controllers;

use App\Classes\Constants\BookingStatus;
use App\Models\Booking;
use App\Models\User;
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
        $users = User::all();
        return view('parking.index', [
            'users' => $users
        ]);
    }

    public function view()
    {
        $bookings = Booking::with('user', 'car')->get();
        $count = 0;

        return view('parking.view', [
            'bookings' => $bookings,
            'count' => $count
        ]);
    }

    public function book(Request $request)
    {
//        dd($request);
        $booking_exists = Booking::where('user_id', $request->user_id)
            ->where('status', BookingStatus::ONGOING)
            ->first();
//        dd(!is_null($booking_exists));

        if (!is_null($booking_exists)) {
            return redirect()->back()->with('message', 'Booking already existed');
        }

        $booking = Booking::create([
            'user_id' => $request->user_id,
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
        $bookings = get_bookings($request->date_booking);

        return $bookings->toJson();
    }

    public function show($booking_id)
    {
        $booking = Booking::with('car')->find($booking_id);

        return view('parking.show', [
            'booking' => $booking
        ]);
    }

    public function getCurrent()
    {
        $booking = Booking::where('user_id', Auth::id())
            ->with('user','car')
            ->where('status', BookingStatus::ONGOING)
            ->first();

        return view('parking.currentBooking', [
            'booking' => $booking
        ]);
    }

    public function getPrevious()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->where('status', BookingStatus::CHECKOUT)
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
        $booking->status = BookingStatus::CHECKOUT;
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
