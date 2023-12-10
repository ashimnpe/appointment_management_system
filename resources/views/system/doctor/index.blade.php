@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Doctors</h3>
        <!-- Main content -->
        <section class="content">
            @include('sweetalert::alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of all Doctors</h3>
                            <div class="">
                                <a href="{{ route('doctor.create') }}">
                                    <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add
                                        New</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>License No</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Role</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $doctor->license_no }}</td>
                                            <td>{{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name }}
                                            </td>
                                            <td>
                                                {{ $doctor->department->department_name }}
                                            </td>
                                            <td>
                                                @if ($doctor->role == 1)
                                                    Admin
                                                @else
                                                    Doctor
                                                @endif
                                            </td>
                                            <td>{{ $doctor->contact }}</td>
                                            <td>{{ $doctor->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('doctor.show', $doctor->id) }}">
                                                    <button class="btn btn-success btn-sm m-1"><i class="fa fa-eye"></i>
                                                        View</button>
                                                </a>

                                                <a href="{{ route('doctor.edit', $doctor->id) }}">
                                                    <button class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i>
                                                        Edit</button>
                                                </a>

                                                <a href="#">
                                                    <button class="btn btn-secondary btn-sm m-1" data-toggle="modal"
                                                        data-target="#modal-reset{{ $doctor->id }}"><i class="fa fa-key"></i>
                                                        Reset Password</button>
                                                </a>

                                                <button class="btn btn-danger btn-sm m-1" data-toggle="modal"
                                                    data-target="#modal-delete{{ $doctor->id }}"><i
                                                        class="fa fa-trash"></i>
                                                    Delete
                                                </button>

                                                <div class="modal fade" id="modal-delete{{ $doctor->id }}">
                                                    <div class="modal-dialog modal-delete">
                                                        <form role="form" method="POST"
                                                            action="{{ route('doctor.destroy', $doctor->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h4>Are you sure want to delete ?</h4>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">No</button>
                                                                    <button class="btn btn-danger">Yes</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

                                                <div class="modal fade" id="modal-reset{{ $doctor->id }}">
                                                    <div class="modal-dialog modal-delete">
                                                        <form role="form" method="POST" action="{{ route('passwordreset') }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-secondary">
                                                                    Reset Password
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <input type="hidden" class="form-control" id="email" name="email"
                                                                        value="{{ $doctor->email }}">
                                                                    <b>Are you sure want to reset pssword ?</b>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                        <button type="submit" class="btn btn-success">Reset</button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            </td>
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
    <!-- ./wrapper -->
@endsection
