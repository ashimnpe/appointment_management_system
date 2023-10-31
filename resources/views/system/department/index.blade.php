@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h3 class="pl-3 mb-0">Department</h3>
        <!-- Main content -->
        <section class="content">
            <x-alerts-box>

            </x-alerts-box>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th>Members</th>
                                        <th>Action</th>
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
                                            <td class="d-flex">
                                                <a href="{{ route('department.edit', $dept->id) }}" class="m-1">
                                                    <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                                        Edit</button>
                                                </a>
                                                <form action="{{ route('department.destroy', $dept->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm m-1"
                                                        onclick="return deleteConfirm('delete department')"><i
                                                            class="fa fa-trash"></i>
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
