@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h2>User Profile</h2>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-primary">
                                <div class="card-header">
                                    User Information
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="mb-3">
                                            <img src="{{ asset(auth()->user()->image) }}" alt="profile" class="profile-pic"  style="width: 100px">
                                        </div>
                                        <div>
                                            <label for="name">Name: </label> {{ $users->name }}
                                        </div>
                                        <div>
                                            <label for="name">Email: </label> {{ $users->email }}
                                        </div>
                                        <div>
                                            <label for="name">Role: </label>
                                            @if ($users->role == 1)
                                                Admin
                                            @elseif($users->role == 2)
                                                Doctor
                                            @else
                                                Superadmin
                                            @endif
                                        </div>
                                        <div>
                                            <label for="name">Status: </label>
                                            {{ $users->status == 1 ? 'Active' : 'Inactive' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
