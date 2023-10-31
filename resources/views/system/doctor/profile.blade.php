@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h4>Doctor Profile</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td><label for="">Image</label></td>
                        <td>
                            <img src="{{ asset($doctor->image) }}" alt="profile" class="profile-pic">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">License No</label></td>
                        <td>{{ $doctor->license_no }}</td>
                    </tr>
                    <tr>
                        <td><label for="">First Name</label></td>
                        <td>{{ $doctor->first_name }}</td>
                    </tr>
                    <tr>
                        <td><label for="">Middle Name</label></td>
                        <td>{{ $doctor->middle_name }}</td>
                    </tr>
                    <tr>
                        <td><label for="Last Name">Last Name</label></td>
                        <td>{{ $doctor->last_name }}</td>
                    </tr>
                    <tr>
                        <td><label for="Email">Email</label></td>
                        <td>{{ $doctor->email }}</td>
                    </tr>
                    <tr>
                        <td><label for="Email">Nepali DOB</label></td>
                        <td>{{ $doctor->nepali_dob }}</td>
                    </tr>
                    <tr>
                        <td><label for="Email">English DOB</label></td>
                        <td>{{ $doctor->english_dob }}</td>
                    </tr>
                    <tr>
                        <td><label for="Department">Department</label></td>
                        <td>{{ $doctor->department->department_name }}</td>
                    </tr>
                    <tr>
                        <td><label for="Role">Role</label></td>
                        <td>{{ $doctor->role }}</td>
                    </tr>
                    <tr>
                        <td><label for="Gender">Gender</label></td>
                        <td>{{ $doctor->gender }}</td>
                    </tr>
                    <tr>
                        <td><label for="Province">Province</label></td>
                        <td>{{ $doctor->province }}</td>
                    </tr>
                    <tr>
                        <td><label for="Contact">Contact</label></td>
                        <td>{{ $doctor->contact }}</td>
                    </tr>
                    <tr>
                        <td><label for="Status">Status</label></td>
                        <td>{{ $doctor->status == 1 ? 'Active' : 'Inactive' }}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endsection
