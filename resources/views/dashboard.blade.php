@extends('layout.app')
@section('content')
    <div class="content-wrapper p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                {{-- Super Admin Dashboard --}}
                @if (auth()->user()->role == 0)
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $data['userCount'] }}</h3>
                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner text-white">
                                    <h3>{{ $data['deptCount'] }}</h3>

                                    <p>Departments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <a href="{{ route('department.index') }}" class="small-box-footer text-white">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $data['doctorCount'] }}</h3>

                                    <p>Doctors</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-user-doctor"></i>
                                </div>
                                <a href="{{ route('doctor.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $data['patientCount'] }}</h3>
                                    <p>Patients</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-hospital-user"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    {{-- Admin Dashboard --}}
                @elseif (auth()->user()->role == 1)
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $data['userCount'] }}</h3>
                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $doctor = DB::table('doctors')->count() }}</h3>

                                    <p>Doctors</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-user-doctor"></i>
                                </div>
                                <a href="{{ route('doctor.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner text-white">
                                    <h3>{{ $data['deptCount'] }}</h3>
                                    <p>Departments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <a href="{{ route('department.index') }}" class="small-box-footer text-white">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $data['patientCount'] }}</h3>
                                    <p>Patients</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-hospital-user"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                @else
                    {{-- Doctor Dashboard --}}
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner text-white">
                                    <h3>{{ $data['deptCount'] }}</h3>

                                    <p>Departments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <a href="#" class="small-box-footer text-white">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner text-white">
                                    <h3>{{ $data['patientCount'] }}</h3>
                                    <p>Patients</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-hospital-user"></i>
                                </div>
                                <a href="#" class="small-box-footer text-white">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
@endsection
