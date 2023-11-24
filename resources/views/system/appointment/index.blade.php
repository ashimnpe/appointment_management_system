@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Appointments</h3>
        <section class="content">
            @include('sweetalert::alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Patients</h3>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Patient Name</th>
                                        <th>Doctor</th>
                                        <th>Booked Date</th>
                                        <th>Booked Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $booking->patient->name }}
                                                </td>
                                                <td>
                                                    {{ $booking->doctor->first_name }}
                                                </td>
                                                <td>
                                                    {{ $booking->book_date_bs }}
                                                </td>
                                                <td>
                                                    {{ $booking->schedule->start_time . ' - ' . $booking->schedule->end_time }}
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('toggleStatus', $booking->id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        @if ($booking->status == 'booked')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">{{ $booking->status }}</button>
                                                        @elseif($booking->status == 'approved')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">{{ $booking->status }}</button>
                                                        @else
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                disabled>{{ $booking->status }}</button>
                                                        @endif



                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#modal-view{{ $booking->id }}">
                                                            <i class="fa fa-eye"></i> View
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-view{{ $booking->id }}">
                                                <div class="modal-dialog modal-edit">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title modal-primary">Patient Details
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Name:</label>
                                                                        {{ $booking->patient->name }}
                                                                    </div>

                                                                    <div>
                                                                        <label for="">Contact:</label>
                                                                        {{ $booking->patient->contact }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Date of Birth:</label>
                                                                        {{ $booking->patient->dob_bs }}
                                                                    </div>
                                                                    <div>
                                                                        <label for="">Address:</label>
                                                                        {{ $booking->patient->address }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Doctor Name:</label>
                                                                        {{ $booking->doctor->first_name }}
                                                                    </div>

                                                                    <div>
                                                                        <label for="">Booked Date:</label>
                                                                        {{ $booking->book_date_bs }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Department:</label>
                                                                        {{ $booking->doctor->department->department_name }}
                                                                    </div>
                                                                    <div>
                                                                        <label for="">Booked Time:</label>
                                                                        {{ $booking->schedule->start_time . ' - ' . $booking->schedule->end_time }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Remarks</label>
                                                                        {{ $booking->remarks }}
                                                                    </div>
                                                                    <div>
                                                                        <label for="">Status</label>
                                                                        @if ($booking->status == 'booked')
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-primary">{{ $booking->status }}</button>
                                                                        @elseif($booking->status == 'approved')
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-success">{{ $booking->status }}</button>
                                                                        @else
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-danger"
                                                                                disabled>{{ $booking->status }}</button>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @elseif($booking->doctor_id === auth()->user()->doctor()->first()->id)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $booking->patient->name }}
                                                </td>
                                                <td>
                                                    {{ $booking->doctor->first_name }}
                                                </td>
                                                <td>
                                                    {{ $booking->book_date_bs }}
                                                </td>
                                                <td>
                                                    {{ $booking->schedule->start_time . ' - ' . $booking->schedule->end_time }}
                                                </td>
                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('toggleStatus', $booking->id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        @if ($booking->status == 'booked')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">{{ $booking->status }}</button>
                                                        @elseif($booking->status == 'approved')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">{{ $booking->status }}</button>
                                                        @else
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                disabled>{{ $booking->status }}</button>
                                                        @endif



                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#modal-view{{ $booking->id }}">
                                                            <i class="fa fa-eye"></i> View
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-view{{ $booking->id }}">
                                                <div class="modal-dialog modal-edit">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title modal-primary">Patient Details
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Name:</label>
                                                                        {{ $booking->patient->name }}
                                                                    </div>

                                                                    <div>
                                                                        <label for="">Contact:</label>
                                                                        {{ $booking->patient->contact }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Date of Birth:</label>
                                                                        {{ $booking->patient->dob_bs }}
                                                                    </div>
                                                                    <div>
                                                                        <label for="">Address:</label>
                                                                        {{ $booking->patient->address }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Doctor Name:</label>
                                                                        {{ $booking->doctor->first_name }}
                                                                    </div>

                                                                    <div>
                                                                        <label for="">Booked Date:</label>
                                                                        {{ $booking->book_date_bs }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Department:</label>
                                                                        {{ $booking->doctor->department->department_name }}
                                                                    </div>
                                                                    <div>
                                                                        <label for="">Booked Time:</label>
                                                                        {{ $booking->schedule->start_time . ' - ' . $booking->schedule->end_time }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <label for="">Remarks</label>
                                                                        {{ $booking->remarks }}
                                                                    </div>
                                                                    <div>
                                                                        <label for="">Status</label>
                                                                        @if ($booking->status == 'booked')
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-primary">{{ $booking->status }}</button>
                                                                        @elseif($booking->status == 'approved')
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-success">{{ $booking->status }}</button>
                                                                        @else
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-danger"
                                                                                disabled>{{ $booking->status }}</button>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
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
