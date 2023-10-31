@extends('layout.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header pb-2">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8  mx-auto ">
                        <h1>Edit Doctor</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Doctor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST"
                                action="{{ route('department.update',$dept->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="department">Department Name</label>
                                                <input type="text" class="form-control" id="dept_name" name="department_name"
                                                    value="{{ $dept->department_name }}"
                                                    >
                                                @error('department_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button class="btn btn-info btn-sm float-right"
                                        onclick="return editConfirm('edit doctor')">Edit</button>
                                </div>
                            </form>
                            <!-- form end -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.left column end -->
                </div>
                <!-- /.row end -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
