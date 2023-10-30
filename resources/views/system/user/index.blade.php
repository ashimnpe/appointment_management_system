@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h3 class="pl-3 mb-0">Users</h3>
        <!-- Main content -->
        <section class="content">
            <x-alerts-box>

            </x-alerts-box>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of all users</h3>
                            <a href="{{ route('user.create') }}">
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
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td class="d-flex">

                                                <a href="{{ route('user.profile', $user->id) }}" class="m-1">
                                                    <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
                                                        View</button>
                                                </a>

                                                <a href="{{ route('user.edit', $user->id) }}" class="m-1">
                                                    <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                                        Edit</button>
                                                </a>
                                                <form action="{{ route('user.delete', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm m-1"
                                                        onclick="return deleteConfirm('delete user')"><i
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

        {{-- User Profile --}}
        {{-- <div class="modal" id="viewProfile">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">User profile</h4>
                    </div>
                    <div class="modal-body">
                            <div class="profile">
                                <div>
                                    <label for="name">Name: </label> {{ $user->name }}
                                </div>
                                <div>
                                    <label for="name">Email: </label> {{ $user->email }}
                                </div>
                                <div>
                                    <label for="name">Role: </label> {{ $user->role }}
                                </div>
                                <div>
                                    <label for="name">Status: </label> {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> --}}

    </div>
    <!-- ./wrapper -->
@endsection
