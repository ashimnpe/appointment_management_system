@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Trash</h3>
        <!-- Main content -->
        <section class="content">
            @include('sweetalert::alert')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $doctor->license_no }}</td>
                                            <td>{{ $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name}}</td>
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
                                            <td class="d-flex">
                                                <a href="{{ route('trash.restore',$doctor->id) }}">
                                                    <button class="btn btn-success btn-sm m-1"><i class="fa fa-arrow-circle-left"></i>
                                                        Restore</button>
                                                </a>

                                                <form action="{{ route('trash.destroy',$doctor->id) }}" method="POST" >
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
