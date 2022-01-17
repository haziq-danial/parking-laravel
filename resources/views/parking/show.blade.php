@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('title', 'Current Booking')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking Details</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    @if(isset($booking))
                        <div class="card-body">
                            <div class="form-group">
                                <label>Booking ID</label>
                                <p>{{ $booking->booking_id }}</p>
                            </div>
                            <div class="form-group">
                                <label>No Plate</label>
                                <p>{{ $booking->car->carPlate }}</p>
                            </div>
                            <div class="form-group">
                                <label>Date Booking</label>
                                <p>{{ $booking->date_booking }}</p>
                            </div>
                            <div class="form-group">
                                <label>Start time</label>
                                <p>{{ $booking->start_time }}</p>
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                <p>{{ $booking->parking_duration }}</p>
                            </div>
                            <div class="form-group">
                                <label>Parking Slot</label>
                                <p>{{ $booking->parking_slot }}</p>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
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
                            </div>
                        </div>

                    @else
                        <div class="card-body">
                            <div class="form-group">
                                <label>no data</label>
                            </div>
                        </div>
                    @endif
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <a href="{{ route('book-parking.previous') }}" class="btn btn-secondary">All Booking</a>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>

    </section>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection
