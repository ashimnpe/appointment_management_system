@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content p-5">
            @include('sweetalert::alert')
            <div class="container ">
                <div class="card mx-auto w-50">
                    <div class="card-header bg-info">
                        Change Password
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mt-3">
                                <div class="col form-group">
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" placeholder="Current Password">
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col form-group">
                                    <input type="password" class="form-control" id="password"
                                        name="password" placeholder="New Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col form-group">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Retype New Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-info w-100">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
