<?php

use App\Classes\Constants\BookingStatus;
use App\Models\Booking;

if (!function_exists('get_bookings')) {
    function get_bookings($date_booking)
    {
        $bookings = Booking::where('date_booking', $date_booking)
            ->where('status', BookingStatus::ONGOING)
            ->get();

        return $bookings;
    }
}
