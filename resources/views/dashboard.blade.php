@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

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
            </div>
        </div>

    </div>
    <!-- ./wrapper -->
@endsection
