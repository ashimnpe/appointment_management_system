@extends('layout.app')
@section('content')
    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Content Header -->
        <section class="content-header pb-2">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-sm-6  mx-auto ">
                        <h1>Create User</h1>
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
                                <h3 class="card-title">Add New User</h3>
                            </div>

                            {{-- Form Start --}}
                            <form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Full Name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmpassword"
                                            name="password_confirmation" placeholder="confirm password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="Role">Role</label><br>
                                        <input type="radio" name="role" value="1"> Admin
                                        <input type="radio" name="role" value="2"> Doctor
                                        @error('role')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name='status'>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="selectImage">
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <img id="preview" src="#" alt="profile" class="mt-3"
                                        style="display:none;" />
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm">Create</button>
                                </div>
                            </form>
                            {{-- Form End --}}

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
