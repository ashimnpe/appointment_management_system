@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Schedule</h3>
        <!-- Main content -->
        <section class="content">
            <x-alerts-box>

            </x-alerts-box>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-1">Time Schedule</h3>
                            <div class="">
                                <a href="{{ route('schedule.create') }}">
                                    <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add
                                        New</button>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">`
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Department</th>
                                        <th>Doctor</th>
                                        <th>Scheduled Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Limit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
