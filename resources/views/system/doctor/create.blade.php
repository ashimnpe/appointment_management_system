@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header pb-2">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8  mx-auto ">
                        <h1>Create Doctor</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Basic Info</h3>
                            </div>
                            {{-- {{ $errors }} --}}
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('doctor.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="license">License No</label>
                                                <input type="number" class="form-control" id="lno" name="license_no"
                                                    placeholder="Enter License Number">
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
                                                    placeholder="Enter First Name">
                                                @error('first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name"
                                                    name="middle_name" placeholder="Enter Middle Name">
                                                @error('middle_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    placeholder="Enter Last Name">
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
                                                placeholder="Enter email">
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                   </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="confirm password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirmpassword"
                                                name="password_confirmation" placeholder="confirm password">
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control" id="department" name="department"
                                                placeholder="Department">
                                            @error('department')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="specialization">Specialization</label>
                                            <input type="text" class="form-control" id="specialization"
                                                name="specialization" placeholder="Specialization">
                                            @error('specialization')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row">

                                        <div class="col form-group">
                                            <label for="date">Date of Birth</label>
                                            <input type="date" class="form-control" id="nepali-datepicker" name="nepali_dob"
                                                placeholder="Date of Birth">
                                            @error('nepali_dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col form-group">
                                            <label for="date">Date of Birth</label>
                                            <input type="date" class="form-control" id="english_dob" name="english_dob"
                                                placeholder="Date of Birth" onclick="return getDate()">
                                            @error('english_dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="Role">Role</label><br>
                                            <input type="radio" name="role" value="Admin"> Admin
                                            <input type="radio" name="role" value="Doctor"> Doctor
                                            @error('role')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="Address">Gender</label> <br>
                                            <input type="radio" name="gender" value="male"> Male
                                            <input type="radio" name="gender" value="female"> Female
                                            <input type="radio" name="gender" value="others"> Others
                                            @error('gender')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="contact">Contact</label>
                                            <input type="number" class="form-control" id="contact" name="contact"
                                                placeholder="Contact">
                                            @error('contact')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name='status'>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
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
                                                placeholder="Province">
                                            @error('province')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="district">District</label>
                                            <input type="text" class="form-control" id="district" name="district"
                                                placeholder="District">
                                            @error('district')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="municipality">Municipality</label>
                                            <input type="text" class="form-control" id="municipality" name="municipality"
                                                placeholder="Municipality">
                                            @error('municipality')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="ward">Ward</label>
                                            <input type="number" class="form-control" id="ward" name="ward"
                                                placeholder="Ward">
                                            @error('ward')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="City">
                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col form-group">
                                            <label for="tole">Tole</label>
                                            <input type="text" class="form-control" id="tole" name="tole"
                                                placeholder="Tole">
                                            @error('tole')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <img id="preview" src="#" alt="profile" class="mt-3"
                                    style="display:none;" />

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm float-right">Next</button>
                                </div>
                            </form>

                            {{ $errors }}
                        </div>
                        <!-- /.card -->
                    </div>

                    <!--/.col (left) -->
                    <!-- right column -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
