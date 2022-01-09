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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Book Parking Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#set-booking-date">
                                <i class="fa fa-plus"></i>
                                Add Items
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
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
                            <div class="form-group">
                                <label>Date Booking</label>
                                <input type="text" name="date_booking" @isset($date_booking) value="{{ $date_booking }}" @endisset readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="text" name="start_time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Parking Hours</label>
                                <input type="text" name="parking_duration" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Parking Slot</label>
                                <input type="text" id="parking-slot" name="parking_slot" value="" readonly class="form-control">
                            </div>
                        </form>
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
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="button" onclick="event.preventDefault(); document.getElementById('parking-detail-form').submit();" value="Create Booking" class="btn btn-success float-right">
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

    @isset($bookings)
        <script type="text/javascript">
            var datas = {{ \Illuminate\Support\Js::from($bookings) }};

            datas.forEach((values) => {
                var parking_ele = '#'+values.parking_slot;

                $(parking_ele).removeClass('pointer');
                $(parking_ele).addClass('not-allowed booked');
            });
        </script>
    @endisset

    <script type="text/javascript">
        $(function () {

           $('#date_booking').datetimepicker({
               format: 'L'
           });

        });
        var before = '';
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
