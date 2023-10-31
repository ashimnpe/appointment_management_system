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
                                <h3 class="card-title">Education</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('doctorEducation.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="institution">Institution</label>
                                                <input type="text" class="form-control" id="lno" name="institution"
                                                    placeholder="Enter Institution Name">
                                                @error('institution')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="board">Board</label>
                                                <input type="text" class="form-control" id="board" name="board"
                                                    placeholder="Enter First Name">
                                                @error('board')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <input type="text" class="form-control" id="level" name="level"
                                                    placeholder="Enter Middle Name">
                                                @error('level')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="marks">Marks</label>
                                                <input type="text" class="form-control" id="marks" name="marks"
                                                    placeholder="Enter Middle Name">
                                                @error('marks')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="completion_date">Completion Date</label>
                                                <input type="date" class="form-control" id="completion_date"
                                                    name="completion_date">
                                                @error('completion_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button class="btn btn-info btn-sm float-right">Next</button>
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
