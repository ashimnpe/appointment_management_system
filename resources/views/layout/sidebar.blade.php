<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <span class="brand-text text-bold brand">
                Appointment Management System
            </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('profile.show') }}" class="d-block">{{ auth()->user()->name }}</a>

                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

                    {{-- Super Admin --}}
                    @if (auth()->user()->role == 0)
                        <div>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa fa-clock"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="fa fa-building"></i>
                                    <p>
                                        Department
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('doctor.index') }}" class="nav-link">
                                    <i class="fa fa-stethoscope"></i>
                                    <p>
                                        Doctors
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('schedule.index') }}" class="nav-link">
                                    <i class="fa fa-calendar"></i>
                                    <p>
                                        Schedule
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trash.index') }}" class="nav-link">
                                    <i class="fa fa-trash"></i>
                                    <p>
                                        Trash
                                    </p>
                                </a>
                            </li>
                        </div>

                        {{-- Admin --}}
                    @elseif (auth()->user()->role == 1)
                        <div>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa fa-clock"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="fa fa-building"></i>
                                    <p>
                                        Department
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('schedule.index') }}" class="nav-link">
                                    <i class="fa fa-calendar"></i>
                                    <p>
                                        Schedule
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trash.index') }}" class="nav-link">
                                    <i class="fa fa-trash"></i>
                                    <p>
                                        Trash
                                    </p>
                                </a>
                            </li>
                        </div>

                        {{-- Doctor --}}
                    @else
                        <div>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa fa-clock"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('department.index') }}" class="nav-link">
                                    <i class="fa fa-building"></i>
                                    <p>
                                        Department
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('schedule.index') }}" class="nav-link">
                                    <i class="fa fa-calendar"></i>
                                    <p>
                                        Schedule
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
