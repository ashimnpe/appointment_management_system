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
                                        {{-- <div class="text-center mb-3">
                                            <img src="{{ asset($doctor->image) }}" alt="profile" class="profile-pic">
                                        </div> --}}
                                        <div>
                                            <label for="name">Name: </label> {{ $users->name }}
                                        </div>
                                        <div>
                                            <label for="name">Email: </label> {{ $users->email }}
                                        </div>
                                        <div>
                                            <label for="name">Role: </label> {{ $users->role }}
                                        </div>
                                        <div>
                                            <label for="name">Status: </label> {{ $users->status == 1 ? 'Active' : 'Inactive' }}
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
