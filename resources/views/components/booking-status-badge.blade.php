@switch($booking->status)
    @case(\App\Classes\Constants\BookingStatus::CHECKOUT)
    <span class="badge bg-success">checkout</span>
    @break
    @case(\App\Classes\Constants\BookingStatus::ONGOING)
    <span class="badge bg-warning">ongoing</span>
    @break
    @case(\App\Classes\Constants\BookingStatus::CANCELED)
    <span class="badge bg-danger">canceled</span>
    @break
@endswitch
