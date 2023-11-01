@extends('layout.app')
@section('content')
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- row --}}
                <div class="row">
                    <div class="col-md-8 mx-auto mt-5">
                        {{-- card --}}
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Department</h3>
                            </div>

                            {{-- Form Start --}}
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
                            {{-- Form End --}}

                        </div>
                        {{-- card end --}}
                    </div>
                </div>
                {{-- row end --}}
            </div>
        </section>
        <!-- Main content End -->
    </div>
        <!-- Content Wrapper End -->
@endsection
