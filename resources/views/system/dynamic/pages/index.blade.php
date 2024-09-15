@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Pages</h3>
        <section class="content">
            @include('sweetalert::alert')

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Page
                    </div>
                    <a href="{{ route('pages.create') }}">
                        <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add
                            New</button>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pages as $key => $page)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $page->title['en'] }}/
                                        {{ $page->title['np'] }}</td>
                                    <td>{{ $page->description['en'] }}/
                                        {{ $page->description['np'] }}</td>
                                    <td>{{ $page->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('pages.edit',$page->id) }}">
                                            <button class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i> Edit</button>
                                        </a>
                                        <form action="{{ route('pages.destroy',$page->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#">
                                                <button class="btn btn-danger btn-sm m-1">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
