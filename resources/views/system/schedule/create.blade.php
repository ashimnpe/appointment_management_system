@extends('layout.app')
@section('content')
    <!-- Content Wrapper-->
    <div class="content-wrapper">
        <!-- Content Header-->
        <section class="content-header pb-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8  mx-auto ">
                        <h1>Create Schedule</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content Header-->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card card-info">
                            {{-- Form Start --}}
                            <form role="form" method="POST" action="{{ route('schedule.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- Doctor Form --}}
                                <div class="scheduleForm">
                                    <div class="card-header">
                                        <div class="card-title">Schedule</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col group-form">
                                                <label for="department_id">Select Department</label>
                                                <select name="department_id" id="department_id" class="form-control">
                                                    <option value="">Select Department</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->department_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="first_name">Doctor</label>
                                                    <select name="doc_id" id="doc_id" class="form-control">
                                                        <option value="">Select Doctor</option>
                                                        {{-- @if ($departments->department_name == 'Surgery') --}}
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">
                                                                    {{ $doctor->first_name }}</option>
                                                            @endforeach
                                                        {{-- @endif --}}

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="first_name">Date</label>
                                                    <input type="text" class="form-control" id="nepali_date"
                                                        name="date_bs" placeholder="Date">
                                                    @error('nepali_dob')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="first_name">Date</label>
                                                    <input type="date" class="form-control" id="english_date"
                                                        name="date_ad" placeholder="Date">
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
                                                    <input type="time" class="form-control" id="start_time"
                                                        name="start_time"  value="10:00">
                                                    @error('start_time')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="end_time">End Time</label>
                                                    <input type="time" class="form-control" id="end_time"
                                                        name="end_time" value="16:00">
                                                    @error('end_time')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn  btn-sm btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                            {{-- Form End --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
    </div>
    <!-- Content Wrapper-->
@endsection
