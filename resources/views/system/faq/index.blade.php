@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <h3 class="p-3 mb-0">Schedule</h3>
        <section class="content">
                @include('sweetalert::alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <a href="{{ route('faq.create') }}">
                                    <button class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add
                                        New</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th  class="w-25">Questions</th>
                                        <th class="w-50">Answers</th>
                                        <th>Acions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($faq as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td  class="w-25">{{ $item->question }}</td>
                                            <td class="w-50">{{ $item->answer }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('faq.edit',$item->id) }}">
                                                    <button class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i>Edit</button>
                                                </a>
                                                <form action="{{ route('faq.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
