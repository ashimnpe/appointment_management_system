@extends('layout.app')
@inject('doctor_helper', 'App\Helpers\DoctorHelper')
@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Schedule</h3>
        <section class="content">
            @include('sweetalert::alert')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-1">Time Schedule</h3>
                            <div class="">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#modal-create">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                        {{-- ------------------------------------ Modal Box to Create Schedule --------------------------------------------- --}}
                        <div class="modal fade" id="modal-create">
                            <div class="modal-dialog modal-default">
                                <form role="form" method="POST" action="{{ route('schedule.store') }}">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title modal-primary">Create
                                                Schedule</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="scheduleForm">
                                                <div class="row mb-2">
                                                    @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                                                        <div class="col group-form">
                                                            {!! Form::label('proince', 'Select Province') !!}

                                                            {!! Form::select('doctor_id', $doctor_helper->list(), null, [
                                                                'class' => 'form-control',
                                                                'placeholder' => 'select doctor',
                                                            ]) !!}
                                                            {{-- <select name="doctor_id" id="doctor_id" class="form-control">
                                                                <option value="">Select Doctor
                                                                </option>
                                                                @foreach ($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}">
                                                                        {{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select> --}}
                                                        </div>
                                                    @elseif(auth()->user()->doctor()->first()->id)
                                                        <input type="hidden"
                                                            value="{{ auth()->user()->doctor()->first()->id }}"
                                                            name="doctor_id">
                                                    @endif
                                                </div>

                                                <div class="row">
                                                    <div class="col group-form">
                                                        <div class="form-group">
                                                            <label for="date">Date</label>
                                                            <input type="text" class="form-control" id="nepali_date"
                                                                name="book_date_bs" placeholder="Date">
                                                            @error('nepali_dob')
                                                                <p class="text-danger">
                                                                    {{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <input type="date" class="form-control" id="english_date"
                                                            name="book_date_ad" placeholder="Date" hidden>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col group-form">
                                                        <div class="form-group">
                                                            <label for="start_time">Start
                                                                Time</label>
                                                            <input type="time" class="form-control" id="start_time"
                                                                name="start_time" value="10:00">
                                                            @error('start_time')
                                                                <p class="text-danger">
                                                                    {{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col group-form">
                                                        <div class="form-group">
                                                            <label for="end_time">End
                                                                Time</label>
                                                            <input type="time" class="form-control" id="end_time"
                                                                name="end_time" value="16:00">
                                                            @error('end_time')
                                                                <p class="text-danger">
                                                                    {{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button class="btn btn-success">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- -------------------------------------------------------------------------------------------------------------- --}}

                        <div class="card-body">
                            <table id="example2" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Doctor</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                                            @foreach ($doctor->schedule->groupBy('book_date_bs') as $date => $schedulesByDate)
                                                @foreach ($schedulesByDate as $index => $schedule)
                                                    <tr>
                                                        @if ($index === 0)
                                                            <td rowspan="{{ count($schedulesByDate) }}">
                                                                {{ $serialNumber++ }}
                                                            </td>
                                                            <td rowspan="{{ count($schedulesByDate) }}">
                                                                {{ $schedule->doctor->first_name }}</td>
                                                            <td rowspan="{{ count($schedulesByDate) }}">
                                                                {{ $schedule->book_date_bs }}</td>
                                                        @endif
                                                        <td>
                                                            {{ $schedule->start_time . ' - ' . $schedule->end_time }}</td>
                                                        <td class="d-flex">
                                                            <a href="#">
                                                                <button class="btn btn-danger btn-sm m-1"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-delete-schedule{{ $schedule->id }}"><i
                                                                        class="fa fa-trash"></i>
                                                                    Delete</button>
                                                            </a>

                                                            {{-- ------------------------------------ Modal Box to Delete Schedule --------------------------------------------- --}}
                                                            <div class="modal fade"
                                                                id="modal-delete-schedule{{ $schedule->id }}">
                                                                <div class="modal-dialog modal-delete">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            Are you sure want to delete?
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('schedule.destroy', $schedule->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button class="btn btn-danger btn-sm m-1"><i
                                                                                        class="fa fa-trash"></i>
                                                                                    Delete
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            {{-- -------------------------------------------------------------------------------------------------------------- --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @elseif(
                                            $doctor->id ===
                                                auth()->user()->doctor()->first()->id)
                                            @foreach ($doctor->schedule->groupBy('book_date_bs') as $date => $schedulesByDate)
                                                @foreach ($schedulesByDate as $index => $schedule)
                                                    <tr>
                                                        @if ($index === 0)
                                                            <td rowspan="{{ count($schedulesByDate) }}">
                                                                {{ $serialNumber++ }}
                                                            </td>
                                                            <td rowspan="{{ count($schedulesByDate) }}">
                                                                {{ $schedule->doctor->first_name }}</td>
                                                            <td rowspan="{{ count($schedulesByDate) }}">
                                                                {{ $schedule->book_date_bs }}</td>
                                                        @endif
                                                        <td>{{ $schedule->start_time . ' - ' . $schedule->end_time }}</td>

                                                        <td class="d-flex">
                                                            <a href="#">
                                                                <button class="btn btn-danger btn-sm m-1"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-delete-schedule{{ $schedule->id }}"><i
                                                                        class="fa fa-trash"></i>
                                                                    Delete</button>
                                                            </a>

                                                            {{-- ------------------------------------ Modal Box to Delete Schedule --------------------------------------------- --}}
                                                            <div class="modal fade"
                                                                id="modal-delete-schedule{{ $schedule->id }}">
                                                                <div class="modal-dialog modal-delete">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            Are you sure want to delete?
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('schedule.destroy', $schedule->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button
                                                                                    class="btn btn-danger btn-sm m-1"><i
                                                                                        class="fa fa-trash"></i>
                                                                                    Delete
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            {{-- -------------------------------------------------------------------------------------------------------------- --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
