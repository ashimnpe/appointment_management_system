<div class="wrapper">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <span class="brand-text text-bold brand">
                Appointment Management System
            </span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    {{-- Super Admin and Admin Sidebar --}}
                    @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                        <div>
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="{{ asset(auth()->user()->image) }}" class="img-circle elevation-2" alt="profile">
                                  </div>
                                <div class="info">
                                    <a href="{{ route('user.show', auth()->user()->id) }}"
                                        class="d-block">{{ auth()->user()->name }}</a>
                                </div>
                            </div>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa fa-tachograph-digital"></i>
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
                                    <i class="fa-solid fa-user-doctor"></i>
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
                                <a href="{{ route('appointment.index') }}" class="nav-link">
                                    <i class="fa fa-hospital-user"></i>
                                    <p>
                                        Appointments
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

                        {{-- Doctor Sidebar --}}
                    @else
                        <div>
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="{{ asset(auth()->user()->doctor()->first()->image) }}" class="img-circle elevation-2" alt="User Image">
                                  </div>
                                <div class="info">
                                    <a href="{{ route('doctor.show',auth()->user()->doctor()->first()->id) }}"
                                        class="d-block">{{ auth()->user()->name }}</a>
                                </div>
                            </div>
                            <li class="nav-item has-treeview">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="fa fa-tachograph-digital"></i>
                                    <p>
                                        Dashboard
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
                                <a href="{{ route('appointment.index') }}" class="nav-link">
                                    <i class="fa fa-hospital-user"></i>
                                    <p>
                                        Appointments
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>
