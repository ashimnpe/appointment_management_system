@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header p-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12  mx-auto ">
                        <h1>Edit Page</h1>
                    </div>
                </div>
            </div>
        </section>
        {{ $errors }}
        <section class="content">
            <div class="container-fluid">
                <div class="card w-50 mx-auto">
                    <div class="card-header bg-info">
                        Dynamic Page
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['pages.update', $pages->id], 'method' => 'put']) !!}
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                    href="#custom-content-below-home" role="tab"
                                    aria-controls="custom-content-below-home" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                                    href="#custom-content-below-profile" role="tab"
                                    aria-controls="custom-content-below-profile" aria-selected="false">नेपाली</a>
                            </li>
                        </ul>
                        <div class="tab-content  mt-3" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">
                                <div class="form-group">
                                    {!! Form::label('title[en]', 'Title[en]') !!}
                                    {!! Form::text('title[en]', $pages->title['en'], ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description[en]', 'Description[en]') !!}
                                    {!! Form::textarea('description[en]', $pages->description['en'], ['class' => 'form-control', 'rows' => 3]) !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                aria-labelledby="custom-content-below-profile-tab">
                                <div class="form-group">
                                    {!! Form::label('title[np]', 'Title[np]') !!}
                                    {!! Form::text('title[np]', $pages->title['np'], ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description[np]', 'Description[np]') !!}
                                    {!! Form::textarea('description[np]', $pages->description['np'], ['class' => 'form-control', 'rows' => 3]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success btn-sm">Update</button>
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </div>
            </div>
        </section>
    </div>
@endsection
