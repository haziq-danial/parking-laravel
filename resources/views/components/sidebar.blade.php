<!-- Main Sidebar Container -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('../img/01-Logo UMP_Full Color.png') }}" class="img-size-32 elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/') }}" class="d-block">PMS</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('manage user')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Manage User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-user.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Users</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-user.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('manage booking')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Manage Parking
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @can('view all booking')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('book-parking.view') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View all Parking</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('book-parking.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Book Parking</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('book-parking.current') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Current Booking</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('book-parking.previous') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Previous Booking</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
