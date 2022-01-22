@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <style>
        .pointer {
            cursor: pointer;
        }

        .not-allowed {
            cursor: not-allowed;
        }

        .booked {
            color: red;
        }

        .selected {
            color: #2563eb;
        }
    </style>
@endsection

@section('title', 'Book parking')

@section('content')
    @include('components.warning-modal')
    @include('components.booking-date-modal')
    @include('components.user-booking-modal')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Book Parking Page</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Parking Menu</h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row justify-content-around">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#set-booking-date">
                                    <i class="fa fa-plus"></i>
                                    Select Booking Date
                                </button>
                                @can('create booking for users')
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#set-booking-user">
                                        <i class="fa fa-user"></i>
                                        Select User
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Parking Details</h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book-parking.book') }}" method="post" id="parking-detail-form">
                            @csrf
                            @can('create booking for users')
                                <div class="form-group">
                                    <label>User name</label>
                                    <input type="text" id="user-name-input" value="" readonly class="form-control">
                                    <input type="hidden" id="user-id-input" name="user_id" value="" readonly class="form-control">
                                </div>
                            @endcan
                            @cannot('create booking for users')
                                <input type="hidden" id="user-id-input" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}" readonly class="form-control">
                            @endcannot

                            <div class="form-group">
                                <label>Date Booking</label>
                                <input type="text" id="booking_input" name="date_booking" value="" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <div class="input-group date" id="start_time" data-target-input="nearest">
                                    <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#start_time"/>
                                    <div class="input-group-append" data-target="#start_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Parking Hours</label>
                                <input type="number" name="parking_duration" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Parking Slot</label>
                                <input type="text" id="parking-slot" name="parking_slot" value="" readonly class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-around">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Back to dashboard</a>
                            <input type="button"
                                   onclick="event.preventDefault(); document.getElementById('parking-detail-form').submit();"
                                   value="Create Booking" class="btn btn-success float-right">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Parking Slot</h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
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
                                        <div id="A1" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A2" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A3" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A4" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A5" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A6" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A7" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A8" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A9" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="A10" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="row">B</td>
                                    <td>
                                        <div id="B1" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B2" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B3" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B4" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B5" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B6" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B7" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B8" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B9" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="B10" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="row">C</td>
                                    <td>
                                        <div id="C1" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C2" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C3" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C4" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C5" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C6" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C7" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C8" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C9" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="C10" onclick="getLocation(this.id)" class="pointer">
                                            <i class="fa fa-car fa-2x"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
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

    @if(session('message'))
        <script type="text/javascript">
            $(document).Toasts('create', {
                class: 'bg-danger',
                autohide: true,
                delay: 4000,
                title: 'Error',
                body: '{{ session('message') }}'
            });
        </script>
    @endif


    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#submit-date').click(function () {
            var date_booking = $('#date-booking').val();
            var booking_modal = $('#set-booking-date');
            var booking_input = $('#booking_input');

            $.post('/parking/get-booking-date',
                {
                    date_booking: date_booking
                },
            function (data, status) {
                var values = JSON.parse(data);

                sortBooking(values);
                booking_modal.modal('hide');
                booking_input.val(date_booking);
            });
        });

        $('#submit-user').click(function () {
            var select_user_modal = $('#set-booking-user');
            var select_option = $('#select-user option:selected');
            var user_id = select_option.val();
            var user_name = select_option.text();
            var name_input = $('#user-name-input');
            var user_id_input = $('#user-id-input');

            user_id_input.val(user_id);
            name_input.val(user_name);
            select_user_modal.modal('hide');
        });

        $(function () {
            var today = new Date();
            today.setDate(today.getDate() + 1);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = `${mm}/${dd}/${yyyy}`;

           $('#date_booking').datetimepicker({
               format: 'L',
               minDate: new Date(today)
           });

           $('#start_time').datetimepicker({
               format: 'LT'
           });

        });
        var before = '';

        function sortBooking(datas) {
            datas.forEach((values) => {
                var parking_ele = '#'+values.parking_slot;

                $(parking_ele).removeClass('pointer');
                $(parking_ele).addClass('not-allowed booked');
            });
        }
        function getLocation(parking_id) {
            var parking_element = '#'+parking_id;


            if ($(parking_element).hasClass('not-allowed booked')) {
                $('#modal-warning').modal('show');
            } else {
                $('#parking-slot').val(parking_id);
                $(parking_element).removeClass('pointer');
                $(parking_element).addClass('pointer selected');

                if (before === '') {
                    before = parking_element
                } else {
                    $(before).removeClass('selected');
                    before = parking_element
                }
            }

        }
    </script>
@endsection
