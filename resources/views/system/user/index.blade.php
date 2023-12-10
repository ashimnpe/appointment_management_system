@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Users</h3>

        <section class="content">
            @include('sweetalert::alert')
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

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
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
                                        <td>
                                            @if ($user->role == 0)
                                                Superadmin
                                            @elseif ($user->role == 1)
                                                Admin
                                            @else
                                                Doctor
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td class="d-flex">
                                            <a href="#" class="m-1">
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#modal-default{{ $user->id }}"><i
                                                        class="fa fa-eye"></i>
                                                    View</button>
                                            </a>

                                            <a href="{{ route('user.edit', $user->id) }}" class="m-1">
                                                <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                                    Edit</button>
                                            </a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
                                    <div class="modal fade" id="modal-default{{ $user->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">User Profile</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <label for="name">Name: </label> {{ $user->name }}
                                                    </div>

                                                    <div>
                                                        <label for="name">Email: </label> {{ $user->email }}
                                                    </div>
                                                    <div>
                                                        <label for="name">Role: </label>
                                                        @if ($user->role == 1)
                                                            Admin
                                                        @elseif($user->role == 2)
                                                            Doctor
                                                        @else
                                                            Superadmin
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <label for="name">Status: </label>
                                                        {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
