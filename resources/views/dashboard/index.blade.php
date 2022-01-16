@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <style>
        .booked {
            color: red;
        }

        .selected {
            color: #2563eb;
        }
    </style>
@endsection

@section('title', 'Dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Available Parking slots for today</h3>
                                <p>{{ $date }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="parking-slot">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>10</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="row">A</td>
                                    <td>
                                        <div id="A1"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A2"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A3"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A4"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A5"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A6"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A7"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A8"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A9"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A10"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="row">B</td>
                                    <td>
                                        <div id="B1"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B2"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B3"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B4"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B5"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B6"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B7"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B8"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B9"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B10"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="row">C</td>
                                    <td>
                                        <div id="C1"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C2"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C3"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C4"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C5"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C6"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C7"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C8"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C9"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C10"  class="">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Booking Details</h3>

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
                                    <label>no booking</label>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    @isset($bookings)
        <script type="text/javascript">
            var datas = {{ \Illuminate\Support\Js::from($bookings) }};

            datas.forEach((values) => {
                var parking_ele = '#'+values.parking_slot;

                $(parking_ele).addClass('not-allowed booked');
            });
        </script>
    @endisset

@endsection
