@extends('layout.app')
@section('content')
    <div class="content-wrapper p-3">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @include('sweetalert::alert')

                {{-- Super Admin Dashboard --}}
                @if (auth()->user()->role == 0 || auth()->user()->role == 1)
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
                                <a href="{{ route('appointment.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <div id="app">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>

            </div>
        @else
            {{-- Doctor Dashboard --}}
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner text-white">
                            <h3>{{ $data['patientCount'] }}</h3>
                            <p>Patients</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-hospital-user"></i>
                        </div>
                        <a href="{{ route('appointment.index') }}" class="small-box-footer text-white">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary">
                            Notifications <span class="float-right badge bg-secondary text-md">{{ $data['notificationCount'] }}</span>
                        </div>

                        @if ($data['notificationCount'] != 0)
                            @foreach ($data['notifications'] as $notification)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{ route('appointment.index') }}">
                                            <span class="text-bold text-sm">
                                                {{ $notification->data['message'] }}
                                            </span>
                                            <span class="text-muted text-bold text-sm">
                                                <br> Date: {{ $notification->data['date'] }} <br>
                                                Time: {{ $notification->data['time'] }}

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        @else
                            <span class="text-center p-2 text-muted">No Appointments</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>


    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'Total',
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: [
                        'rgba(0, 255, 0, 0.7)',
                        'rgba(255, 0, 0, 0.7)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>


