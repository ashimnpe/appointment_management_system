@extends('layout.app')
@section('content')
    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Content Header -->
        <section class="content-header pb-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6  mx-auto ">
                        <h1>Edit User</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content Header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- row --}}
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('user.update',$user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Full Name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email" value="{{ $user->email }}">
                                    </div>

                                    <div class="col form-group">
                                        <label for="Role">Role</label><br>
                                        <input type="radio" name="role" value="Admin"
                                            {{ $user->role == '1' ? 'checked' : '' }}> Admin
                                        <input type="radio" name="role" value="Doctor"
                                            {{ $user->role == '2' ? 'checked' : '' }}> Doctor
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name='status'>
                                                    @if ($user->status == 1)
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    @endif
                                                    @if ($user->status == 0)
                                                        <option value="0">Inactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm float-right"
                                        onclick="return editConfirm('edit user')">Edit</button>
                                </div>
                            </form>


                        </div>
                        {{-- Card --}}

                    </div>
                </div>
                {{-- row --}}
            </div>
        </section>
        <!-- Main content -->

    </div>
    <!-- Content Wrapper -->
@endsection
