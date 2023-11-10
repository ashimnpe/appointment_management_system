@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Schedule</h3>
        <!-- Main content -->
        <section class="content">
            <x-alerts-box>

            </x-alerts-box>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-1">Time Schedule</h3>
                            <div class="">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#modal-lg">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Doctor</th>
                                        <th>Department</th>
                                        <th>Scheduled Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Limit</th>
                                        <th>Available Limit</th>
                                        <th>Created by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $schedule->doctor->first_name . ' ' . $schedule->doctor->middle_name . ' ' . $schedule->doctor->last_name }}
                                            </td>
                                            <td>{{ $schedule->doctor->department->department_name }}</td>
                                            <td>{{ $schedule->date_bs }}</td>
                                            <td>{{ $schedule->start_time }}</td>
                                            <td>{{ $schedule->end_time }}</td>
                                            <td>{{ $schedule->limit }}</td>
                                            <td>{{ $schedule->available_limit }}</td>
                                            <td>{{ $schedule->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    -{{-------------------------------------- Modal Box to Create Schedule -----------------------------------------------}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <form role="form" method="POST" action="{{ route('schedule.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="scheduleForm">
                            <div class="row mb-2">
                                <div class="col group-form">
                                    <label for="doctor_id">Select Doctor</label>
                                    <select name="doctor_id" id="doctor_id" class="form-control">
                                        <option value="">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col group-form">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="text" class="form-control" id="nepali_date" name="date_bs"
                                            placeholder="Date">
                                        @error('nepali_dob')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col group-form" hidden>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" id="english_date" name="date_ad"
                                            placeholder="Date">
                                        @error('nepali_dob')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col group-form">
                                    <div class="form-group">
                                        <label for="limit">Limit</label>
                                        <input type="number" class="form-control" id="limit" name="limit"
                                            placeholder="Max Limit">
                                        @error('nepali_dob')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col group-form">
                                    <div class="form-group">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" class="form-control" id="start_time" name="start_time"
                                            value="10:00">
                                        @error('start_time')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col group-form">
                                    <div class="form-group">
                                        <label for="end_time">End Time</label>
                                        <input type="time" class="form-control" id="end_time" name="end_time"
                                            value="16:00">
                                        @error('end_time')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- -------------------------------------------------------------------------------------------------------------- --}}
@endsection
