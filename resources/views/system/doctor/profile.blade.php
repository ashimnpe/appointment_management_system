@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <h3 class=>Profile</h3>
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($doctor->image) }}"
                                    alt="profile">
                            </div>
                            <h3 class="profile-username text-center">
                                {{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name }}</h3>

                            <p class="text-muted text-center">
                                @if ($doctor->role == 1)
                                    Admin
                                @elseif($doctor->role == 2)
                                    Doctor
                                @else
                                    Superadmin
                                @endif
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Status: </b> {{ $doctor->user->status == 1 ? 'Active' : 'Inactive' }}
                                </li>
                                <li class="list-group-item">
                                    <b>License No:</b> {{ $doctor->license_no }}
                                </li>

                                <li class="list-group-item">
                                    <b>Email:</b> {{ $doctor->email }}
                                </li>
                                <li class="list-group-item">
                                    <b>Department: </b> {{ $doctor->department->department_name }}
                                </li>
                                <li class="list-group-item">
                                    <b>Specialization: </b> {{ $doctor->specialization }}
                                </li>
                                <li class="list-group-item">
                                    <b>Age: </b>
                                    {{ $age['ty'] . ' years ' . $age['tm'] . ' month ' . $age['td'] . ' day' }}
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth(BS): </b> {{ $doctor->nepali_dob }}
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth(AD): </b> {{ $doctor->english_dob }}
                                </li>
                                <li class="list-group-item">
                                    <b>Gender: </b> {{ $doctor->gender }}
                                </li>
                                <li class="list-group-item">
                                    <b>Contact: </b> {{ $doctor->contact }}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- About Me Box -->
                <div class="col-md-8 ">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-graduation-cap mr-1"></i>Academic Qualification</strong>
                            <div class="edu text-muted">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>Institution</th>
                                        <th>Board/University</th>
                                        <th>Level</th>
                                        <th>Marks</th>
                                        <th>Completion Date</th>
                                    </tr>
                                    @foreach ($doctor->education as $education)
                                        <tr>
                                            <td>{{ $education->institution }}</td>
                                            <td>{{ $education->board }}</td>
                                            <td>{{ $education->level }}</td>
                                            <td>{{ $education->marks }}</td>
                                            <td>{{ $education->completion_date }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <hr>

                            <strong><i class="fa fa-briefcase mr-1"></i> Experience</strong>
                            <div class="exp ">
                                <table class="table table-bordered table-hover text-muted">
                                    <tr>
                                        <th>Organization Name</th>
                                        <th>Position</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Job Description</th>
                                    </tr>
                                    @foreach ($doctor->experience as $experience)
                                        <tr>
                                            <td>{{ $experience->organization_name }}</td>
                                            <td>{{ $experience->position }}</td>
                                            <td>{{ $experience->start_date }}</td>
                                            <td>{{ $experience->end_date }}</td>
                                            <td>{{ $experience->job_description }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <div class="location text-muted">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <b>Province: </b>{{ $doctor->province }}
                                        </div>
                                        <div>
                                            <b>Municipality: </b> {{ $doctor->municipality }}
                                        </div>
                                        <div>
                                            <b>Ward: </b>{{ $doctor->ward }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <b>District: </b> {{ $doctor->district }}
                                        </div>
                                        <div>
                                            <b>City: </b> {{ $doctor->city }}
                                        </div>

                                        <div>
                                            <b>Tole: </b> {{ $doctor->tole }}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-right">
                            @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                            @endif
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>









                <!-- /.col -->
            </div>
        </div>
    </div>
@endsection
