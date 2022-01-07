@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('title', 'Book parking')

@section('content')
    <div id="set-booking-date" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set Booking Date</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('book-parking.get-booking-date') }}" id="set-date-form">
                        @csrf
                        <div class="form-group">
                            <label>Date Booking</label>
                            <div class="input-group date" id="date_booking" data-target-input="nearest">
                                <input type="text" name="date-booking" class="form-control datetimepicker-input" data-target="#date_booking"/>
                                <div class="input-group-append" data-target="#date_booking" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="event.preventDefault(); document.getElementById('set-date-form').submit()" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
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
                                    <td><a id="A1" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A2" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A3" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A4" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A5" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A6" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A7" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A8" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A9" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="A10" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>

                                </tr>
                                <tr>
                                    <td class="row">B</td>
                                    <td><a id="B1" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B2" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B3" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B4" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B5" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B6" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B7" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B8" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B9" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="B10" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="row">C</td>
                                    <td><a id="C1" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C2" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C3" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C4" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C5" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C6" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C7" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C8" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C9" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
                                    <td><a id="C10" onclick="getLocation(this.id)" class="link-black"><i class="fa fa-car fa-2x"></i></a></td>
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

    <script type="text/javascript">
        $(function () {
           $('#date_booking').datetimepicker({
               format: 'L'
           });

        });
        function getLocation(parking_id) {
            console.log(parking_id);
            $('#parking-slot').val(parking_id);
        }
    </script>
@endsection
