@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Menu</h3>
        <section class="content">
            @include('sweetalert::alert')

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Menu
                    </div>
                        <a href="{{ route('menu.create') }}">
                            <button class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i> Add New</button>
                        </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Name</th>
                                <th>Display Order</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->order }}</td>
                                    <td>{{ $menu->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        @if ($menu->type == 1)
                                            Module
                                        @elseif ($menu->type == 2)
                                            Page
                                        @else
                                            External Link
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('menu.edit',$menu->id) }}">
                                            <button class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i> Edit</button>
                                        </a>
                                        <form action="{{ route('menu.destroy',$menu->id) }}" method="post">
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
