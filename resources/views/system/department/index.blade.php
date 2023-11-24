@extends('layout.app')
@section('content')
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Department</h3>
        <!-- Main content -->
        <section class="content">
            {{-- alert box --}}
            @include('sweetalert::alert')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Department</h3>
                            <a href="{{ route('department.create') }}">
                                <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add
                                    New</button>
                            </a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            {{-- table --}}
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Department Name</th>
                                        <th>Members</th>
                                        @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $dept)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dept->department_name }}</td>
                                            <td>
                                                {{ $dept->doctor->count() }}
                                            </td>
                                            @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                                                <td class="d-flex">
                                                    <button class="btn btn-warning btn-sm m-1" data-toggle="modal"
                                                        data-target="#modal-edit{{ $dept->id }}"><i
                                                            class="fa fa-edit"></i>
                                                        Edit</button>
                                                    <button class="btn btn-danger btn-sm m-1" data-toggle="modal"
                                                        data-target="#modal-delete{{ $dept->id }}"><i
                                                            class="fa fa-trash"></i>
                                                        Delete</button>

                                                    <div class="modal fade" id="modal-edit{{ $dept->id }}">
                                                        <div class="modal-dialog modal-edit">
                                                            <form role="form" method="POST"
                                                                action="{{ route('department.update', $dept->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h4 class="mb-0">Edit Department</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col group-form">
                                                                                    <div class="form-group">
                                                                                        <label for="department">Department
                                                                                            Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="dept_name"
                                                                                            name="department_name"
                                                                                            value="{{ $dept->department_name }}">
                                                                                        @error('department_name')
                                                                                            <p class="text-danger">
                                                                                                {{ $message }}</p>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default"
                                                                                data-dismiss="modal">No</button>
                                                                            <button class="btn btn-info">Yes</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>

                                                    <div class="modal fade" id="modal-delete{{ $dept->id }}">
                                                        <div class="modal-dialog modal-delete">
                                                            <form role="form" method="POST"
                                                                action="{{ route('department.destroy', $dept->id) }}">
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
                                                </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- table --}}

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
