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
                                action="{{ route('doctor.update', ['id' => $doctor->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name"
                                                    value="{{ $doctor->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name"
                                                    name="middle_name" value="{{ $doctor->middle_name }}">
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    value="{{ $doctor->last_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="license">License No</label>
                                                <input type="number" class="form-control" id="lno" name="license_no"
                                                    value="{{ $doctor->license_no }}">
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $doctor->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="group-form">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control" id="department" name="department"
                                                value="{{ $doctor->department }}">
                                        </div>
                                        <div class="col form-group">
                                            <label for="role">Role</label>
                                            <input type="text" class="form-control" id="role" name="role"
                                                value="{{ $doctor->role }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="specialization">Specialization</label>
                                            <input type="text" class="form-control" id="specialization"
                                                name="specialization" value="{{ $doctor->specialization }}">
                                        </div>
                                        <div class="col form-group">
                                            <label for="date">Date of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                value="{{ $doctor->dob }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="Address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $doctor->address }}">
                                        </div>
                                        <div class="col form-group">
                                            <label for="contact">Contact</label>
                                            <input type="number" class="form-control" id="contact" name="contact"
                                                value="{{ $doctor->contact }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="Address">Gender</label> <br>
                                            <input type="radio" name="gender" value="male"
                                                {{ $doctor->gender == 'male' ? 'checked' : '' }}> Male
                                            <input type="radio" name="gender" value="female"
                                                {{ $doctor->gender == 'female' ? 'checked' : '' }}> Female
                                            <input type="radio" name="gender" value="others"
                                                {{ $doctor->gender == 'others' ? 'checked' : '' }}> Others
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
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm"
                                        onclick="return editConfirm('edit doctor')">Edit</button>
                                </div>
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
