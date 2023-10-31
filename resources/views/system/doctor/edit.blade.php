@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header pb-2">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8  mx-auto ">
                        <h1>Edit Doctor</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Doctor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST"
                                action="{{ route('doctors.update', ['id' => $doctor->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="license">License No</label>
                                                <input type="number" class="form-control" id="lno" name="license_no"
                                                    value="{{ $doctor->license_no }}">
                                                @error('license_no')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name"
                                                    value="{{ $doctor->first_name }}">
                                                @error('first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name"
                                                    name="middle_name" value="{{ $doctor->middle_name }}">
                                                @error('middle_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    value="{{ $doctor->last_name }}">
                                                @error('last_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $doctor->email }}">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- <div class="col form-group">
                                            <div class="form-group">
                                                <label for="department_id">Select Department</label>
                                                <select name="department_id" id="department_id" class="form-control"
                                                    required>
                                                    <option value="">Select Department</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->department_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('department_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div> --}}

                                        <div class="col form-group">
                                            <label for="specialization">Specialization</label>
                                            <input type="text" class="form-control" id="specialization"
                                                name="specialization" value="{{ $doctor->specialization }}">
                                            @error('specialization')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row">

                                        <div class="col form-group">
                                            <label for="date">Date of Birth</label>
                                            <input type="date" class="form-control" id="nepali-datepicker"
                                                name="nepali_dob" value="{{ $doctor->nepali_dob }}">
                                            @error('nepali_dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col form-group">
                                            <label for="date">Date of Birth</label>
                                            <input type="date" class="form-control" id="english_dob"
                                                name="english_dob" value="{{ $doctor->english_dob }}"
                                                onclick="return getDate()">
                                            @error('english_dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                         <div class="col form-group">
                                        <label for="Role">Role</label><br>
                                        <input type="radio" name="role" value="Admin"
                                            {{ $doctor->role == 'Admin' ? 'checked' : '' }}> Admin
                                        <input type="radio" name="role" value="Doctor"
                                            {{ $doctor->role == 'Doctor' ? 'checked' : '' }}> Doctor
                                    </div>

                                        <div class="col form-group">
                                            <label for="Address">Gender</label> <br>
                                            <input type="radio" name="gender" value="male"
                                                {{ $doctor->gender == 'male' ? 'checked' : '' }}> Male
                                            <input type="radio" name="gender" value="female"
                                                {{ $doctor->gender == 'female' ? 'checked' : '' }}> Female
                                            <input type="radio" name="gender" value="others"
                                                {{ $doctor->gender == 'others' ? 'checked' : '' }}> Others
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="contact">Contact</label>
                                            <input type="number" class="form-control" id="contact" name="contact"
                                            value="{{ $doctor->contact }}">
                                            @error('contact')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name='status'>
                                                    @if ($doctor->status == 1)
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    @endif
                                                    @if ($doctor->status == 0)
                                                        <option value="0">Inactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="group-form">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="selectImage">
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <hr>
                                    {{-- address --}}
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="province">Province</label>
                                            <input type="text" class="form-control" id="province" name="province"
                                            value="{{ $doctor->province }}">
                                            @error('province')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="district">District</label>
                                            <input type="text" class="form-control" id="district" name="district"
                                            value="{{ $doctor->district }}">
                                            @error('district')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="municipality">Municipality</label>
                                            <input type="text" class="form-control" id="municipality"
                                                name="municipality" value="{{ $doctor->municipality }}">
                                            @error('municipality')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="ward">Ward</label>
                                            <input type="number" class="form-control" id="ward" name="ward"
                                            value="{{ $doctor->ward }}">
                                            @error('ward')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                            value="{{ $doctor->city }}">
                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="tole">Tole</label>
                                            <input type="text" class="form-control" id="tole" name="tole"
                                            value="{{ $doctor->tole }}">
                                            @error('tole')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm float-right"
                                            onclick="return editConfirm('edit doctor')">Edit</button>
                                    </div>

                                </div>
                                <!-- /.card-body -->


                            </form>
                            <!-- form end -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.left column end -->
                </div>
                <!-- /.row end -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
