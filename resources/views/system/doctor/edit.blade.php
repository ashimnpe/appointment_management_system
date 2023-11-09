@extends('layout.app')
@section('content')
    <!-- Content Wrapper-->
    <div class="content-wrapper">
        <!-- Content Header-->
        <section class="content-header pb-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12  mx-auto ">
                        <h1>Edit Doctor</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content Header-->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-info">
                            {{-- Form Start --}}
                            <form role="form" method="POST" action="{{ route('doctor.update', $doctor->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Doctor Form --}}
                                <div class="doctorForm" id="basicinfo" style="display: block">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="license">License No</label>
                                                    <input type="number" class="form-control" id="license_no"
                                                        name="license_no" value="{{ $doctor->license_no }}">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                        name="first_name" value="{{ $doctor->first_name }}">

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
                                                    <input type="text" class="form-control" id="last_name"
                                                        name="last_name" value="{{ $doctor->last_name }}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                <div class="form-group">
                                                    <label for="department_id">Select Department</label>
                                                    <select name="department_id" id="department_id" class="form-control">
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">
                                                                {{ $department->department_name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col form-group">
                                                <label for="specialization">Specialization</label>
                                                <input type="text" class="form-control" id="specialization"
                                                    name="specialization" value="{{ $doctor->specialization }}">

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="date">Date of Birth</label>
                                                <input type="text" class="form-control" id="nepali_dob" name="nepali_dob"
                                                    value="{{ $doctor->nepali_dob }}">

                                            </div>
                                            <div class="col form-group">
                                                <label for="contact">Contact</label>
                                                <input type="number" class="form-control" id="contact" name="contact"
                                                    value="{{ $doctor->contact }}">

                                            </div>

                                            <div class="col form-group" hidden>
                                                <input type="date" id="english_dob" name="english_dob"
                                                    value="{{ $doctor->english_dob }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="Role">Role</label><br>
                                                <input type="radio" name="role" value="1"
                                                    {{ $doctor->role == '1' ? 'checked' : '' }}> Admin
                                                <input type="radio" name="role" value="2"
                                                    {{ $doctor->role == '2' ? 'checked' : '' }}> Doctor
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
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Status: </label>
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



                                        <hr>
                                        {{-- address --}}
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="province">Province</label>
                                                <input type="text" class="form-control" id="province"
                                                    name="province" value="{{ $doctor->province }}">

                                            </div>
                                            <div class="col form-group">
                                                <label for="district">District</label>
                                                <input type="text" class="form-control" id="district"
                                                    name="district" value="{{ $doctor->district }}">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="municipality">Municipality</label>
                                                <input type="text" class="form-control" id="municipality"
                                                    name="municipality" value="{{ $doctor->municipality }}">

                                            </div>
                                            <div class="col form-group">
                                                <label for="ward">Ward</label>
                                                <input type="number" class="form-control" id="ward" name="ward"
                                                    value="{{ $doctor->ward }}">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city"
                                                    value="{{ $doctor->city }}">

                                            </div>
                                            <div class="col form-group">
                                                <label for="tole">Tole</label>
                                                <input type="text" class="form-control" id="tole" name="tole"
                                                    value="{{ $doctor->tole }}">
                                            </div>
                                        </div>
                                        <div class="group-form">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" name="image" id="selectImage">
                                            </div>
                                        </div>

                                        <img id="preview" src="{{ asset($doctor->image) }}" alt="profile" class="mt-3"/>
                                    </div>
                                    <div class="card-footer float-right">
                                        <a href="#" class="btn btn-info btn-sm" onclick="toggleFormOne()"
                                            id="toggleFormOne">Next</a>
                                    </div>
                                </div>

                                {{-- Education Form --}}
                                <div class="educationForm" id="education" style="display: none">
                                    <div class="card-header">
                                        <h3 class="card-title">Education</h3>
                                        <a href="#" id="addEducation" class="btn btn-primary btn-sm float-right">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    @foreach ($doctor->education as $item)
                                        <div class="card-body">
                                            <div class="row education-form">
                                                <div class="col roup-form">
                                                    <div class="form-group">
                                                        <label for="institution">Institution</label>
                                                        <input type="text" class="form-control" id="institution"
                                                            name="institution[]" value="{{ $item->institution }}">
                                                    </div>
                                                </div>
                                                <div class="col group-form">
                                                    <div class="form-group">
                                                        <label for="board">Board/University</label>
                                                        <input type="text" class="form-control" id="board"
                                                            name="board[]" value="{{ $item->board }}">
                                                    </div>
                                                </div>
                                                <div class="col group-form">
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control" name='level[]'>
                                                            @if ($item->level == 'SEE')
                                                                <option value="SEE">SEE</option>
                                                                <option value="+2">+2</option>
                                                                <option value="Bachelor">Bachelor</option>
                                                                <option value="Master">Master</option>
                                                            @endif
                                                            @if ($item->level == '+2')
                                                                <option value="+2">+2</option>
                                                                <option value="SEE">SEE</option>
                                                                <option value="Bachelor">Bachelor</option>
                                                                <option value="Master">Master</option>
                                                            @endif
                                                            @if ($item->level == 'Bachelor')
                                                                <option value="Bachelor">Bachelor</option>
                                                                <option value="SEE">SEE</option>
                                                                <option value="+2">+2</option>
                                                                <option value="Master">Master</option>
                                                            @endif
                                                            @if ($item->level == 'Master')
                                                                <option value="Master">Master</option>
                                                                <option value="SEE">SEE</option>
                                                                <option value="+2">+2</option>
                                                                <option value="Bachelor">Bachelor</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col group-form">
                                                    <div class="form-group">
                                                        <label for="marks">Marks</label>
                                                        <input type="text" class="form-control" id="marks"
                                                            name="marks[]" value="{{ $item->marks }}">
                                                    </div>
                                                </div>
                                                <div class="col group-form">
                                                    <div class="form-group">
                                                        <label for="completion_date">Completion Date</label>
                                                        <input type="text" class="form-control" id="completion_date"
                                                            name="completion_date[]" value="{{ $item->completion_date }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="#"
                                                            class="btn btn-danger btn-sm removeEducation">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="card-footer ">
                                        <a href="#" class="btn btn-secondary btn-sm" onclick="toggleFormOne()"
                                            id="toggleFormOne">Previous</a>
                                        <a href="#" class="btn btn-info btn-sm float-right"
                                            onclick="toggleFormTwo()" id="toggleFormTwo">Next</a>
                                    </div>
                                </div>

                                {{-- Experience Form --}}
                                <div class="experienceForm" id="experience" style="display: none">
                                    <div class="card-header">
                                        <h3 class="card-title">Experience</h3>
                                        <a href="#" id="addExperience" class="btn btn-primary btn-sm float-right">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    @foreach ($doctor->experience as $item2)
                                        <div class="card-body">
                                            <div class="row experience-form">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="organization_name">Organization Name</label>
                                                        <input type="text" class="form-control" id="organization_name"
                                                            name="organization_name[]"
                                                            value="{{ $item2->organization_name }}">
                                                        @error('organization_name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="position">Position</label>
                                                        <input type="text" class="form-control" id="position"
                                                            name="position[]" value="{{ $item2->position }}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="start_date">Start date</label>
                                                        <input type="month" class="form-control" id="start_date"
                                                            name="start_date[]" value="{{ $item2->start_date }}">
                                                        @error('start_date')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="end_date">End date</label>
                                                        <input type="month" class="form-control" id="end_date"
                                                            name="end_date[]" value="{{ $item2->end_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="level">Job Description</label><br>
                                                        <textarea name="job_description[]" id="job_description" rows="2">
                                                            {{ $item2->job_description }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="#" class="btn btn-danger btn-sm removeExperience">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-secondary btn-sm" onclick="toggleFormTwo()"
                                            id="toggleFormTwo">Previous</a>
                                        <a href="#" class="btn btn-info btn-sm float-right"
                                            onclick="toggleFormThree()" id="toggleFormTwo">Next</a>

                                    </div>
                                </div>

                                {{-- Login Form --}}
                                <div class="loginForm" id="doctorlogin" style="display: none;">
                                    <div class="card-header">
                                        <h3 class="card-title">Credentials</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col group-form">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" value="{{ $doctor->email }}">
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-secondary btn-sm" onclick="toggleFormThree()"
                                            id="toggleFormTwo">Previous</a>
                                        <button class="btn btn-info btn-sm float-right" id="">Submit</button>
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
