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
                                <h3 class="card-title">Create Department</h3>
                            </div>

                            {{-- Form Start --}}
                            <form role="form" method="POST" action="{{ route('department.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col group-form">
                                            <div class="form-group">
                                                <label for="department">Department Name</label>
                                                <input type="text" class="form-control" id="dept_name" name="department_name"
                                                    placeholder="Enter Department Name">
                                                @error('department_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-info btn-sm float-right">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
