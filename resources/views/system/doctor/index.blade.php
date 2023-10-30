@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h3 class="pl-3 mb-0">Doctors</h3>
        <!-- Main content -->
        <section class="content">
            <x-alerts-box>

            </x-alerts-box>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of all Doctors</h3>
                            <a href="{{ route('doctor.create') }}">
                                <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add
                                    New</button>
                            </a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>License No</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Role</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $doctor->license_no }}</td>
                                            <td>{{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name}}</td>
                                            <td>{{ $doctor->department }}</td>
                                            <td>{{ $doctor->role }}</td>
                                            <td>{{ $doctor->contact }}</td>
                                            <td>{{ $doctor->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('doctor.profile', $doctor->id) }}">
                                                    <button class="btn btn-success btn-sm m-1"><i class="fa fa-eye"></i>
                                                        View</button>
                                                </a>
                                                <a href="{{ route('doctor.edit', $doctor->id) }}">
                                                    <button class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i>
                                                        Edit</button>
                                                </a>

                                                <form action="{{ route('doctor.delete', ['id' => $doctor->id]) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm m-1" onclick="return deleteConfirm('delete doctor')"><i class="fa fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </tfoot>
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
