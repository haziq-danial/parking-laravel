@extends('layouts.app')


@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('title', 'Create User')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
            </div>
        </div>
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
                    <div class="card-body">
                        <form action="{{ route('manage-user.store') }}" method="post" id="create-user-form">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Matric ID</label>
                                <input type="text" name="matricID" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Car Plate Number</label>
                                <input type="text" name="carPlate" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label>Role Type</label>
                                <div class="form-group">
                                    <select class="form-control" name="role_type">
                                        <option value="">-- Select User --</option>
                                        <option value="{{ \App\Classes\Constants\RoleType::ADMIN }}">Admin</option>
                                        <option value="{{ \App\Classes\Constants\RoleType::STUDENT }}">Student</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>


                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <button type="button" onclick="event.preventDefault(); document.getElementById('create-user-form').submit()" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
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


