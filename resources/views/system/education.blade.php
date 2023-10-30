@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header pb-2">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8  mx-auto ">
                        <h1>Create Doctor</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Experience</h3>
                            </div>
                            {{-- {{ $errors }} --}}
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('experience.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="organization_name">Organization Name</label>
                                                <input type="number" class="form-control" id="lno" name="organization_name"
                                                    placeholder="Enter Organization Name">
                                                @error('organization_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <input type="text" class="form-control" id="position" name="position"
                                                    placeholder="Enter Position">
                                                @error('position')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="start_date">Start date</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date"
                                                    placeholder="Enter First Name">
                                                @error('start_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="end_date">End date</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    placeholder="Enter First Name">
                                                @error('end_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="level">Job Description</label><br>
                                               <textarea name="job_description" id="job_description" cols="100" rows="10"></textarea>
                                            </div>
                                            @error('job_description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <img id="preview" src="#" alt="profile" class="mt-3" style="display:none;" />

                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm float-right">Next</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>

                    <!--/.col (left) -->
                    <!-- right column -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
