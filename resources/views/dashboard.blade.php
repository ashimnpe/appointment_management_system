@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- Doctor Dashboard --}}
                @if (auth()->user()->role == 2)
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="sticky-top mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Draggable Events</h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- the events -->
                                                <div id="external-events">
                                                    <div class="external-event bg-success">Lunch</div>
                                                    <div class="external-event bg-warning">Go home</div>
                                                    <div class="external-event bg-info">Do homework</div>
                                                    <div class="external-event bg-primary">Work on UI design</div>
                                                    <div class="external-event bg-danger">Sleep tight</div>
                                                    <div class="checkbox">
                                                        <label for="drop-remove">
                                                            <input type="checkbox" id="drop-remove">
                                                            remove after drop
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Create Event</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                                    <ul class="fc-color-picker" id="color-chooser">
                                                        <li><a class="text-primary" href="#"><i
                                                                    class="fas fa-square"></i></a></li>
                                                        <li><a class="text-warning" href="#"><i
                                                                    class="fas fa-square"></i></a></li>
                                                        <li><a class="text-success" href="#"><i
                                                                    class="fas fa-square"></i></a></li>
                                                        <li><a class="text-danger" href="#"><i
                                                                    class="fas fa-square"></i></a></li>
                                                        <li><a class="text-muted" href="#"><i
                                                                    class="fas fa-square"></i></a></li>
                                                    </ul>
                                                </div>
                                                <!-- /btn-group -->
                                                <div class="input-group">
                                                    <input id="new-event" type="text" class="form-control"
                                                        placeholder="Event Title">

                                                    <div class="input-group-append">
                                                        <button id="add-new-event" type="button"
                                                            class="btn btn-primary">Add</button>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <div class="card card-primary">
                                        <div class="card-body p-0">
                                            <!-- THE CALENDAR -->
                                            <div id="calendar"></div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    {{-- Admin Dashboard --}}
                @elseif (auth()->user()->role == 1)
                    <div class="row">
                        {{-- User Count --}}
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $user = DB::table('users')->count() }}</h3>

                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        {{-- Doctor Count --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $doctor = DB::table('doctors')->count() }}</h3>

                                    <p>Doctors</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-stethoscope"></i>
                                </div>
                                <a href="{{ route('doctor.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        {{-- Inactive Users Count --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner text-white">
                                    <h3>{{ $department = DB::table('departments')->count() }}</h3>

                                    <p>Departments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <a href="{{ route('department.index') }}" class="small-box-footer text-white">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        {{-- Inactive Users Count --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $user = DB::table('users')->where('status', 0)->count() }}</h3>

                                    <p>Inctive Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-slash"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                @else
                    {{-- Super Admin Dashboard --}}
                    <div class="row">
                        {{-- User Count --}}
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $user = DB::table('users')->count() }}</h3>

                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        {{-- Doctor Count --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $doctor = DB::table('doctors')->count() }}</h3>

                                    <p>Doctors</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-stethoscope"></i>
                                </div>
                                <a href="{{ route('doctor.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        {{-- Inactive Users Count --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner text-white">
                                    <h3>{{ $department = DB::table('departments')->count() }}</h3>

                                    <p>Departments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <a href="{{ route('department.index') }}" class="small-box-footer text-white">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        {{-- Inactive Users Count --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $user = DB::table('users')->where('status', 0)->count() }}</h3>

                                    <p>Inctive Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-slash"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                @endif
            </div>
        </div>

    </div>
    <!-- ./wrapper -->
@endsection
