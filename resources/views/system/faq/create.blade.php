@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header pb-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12  mx-auto ">
                        <h1>FAQ</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header bg-info">
                                <div class="card-title">
                                    Create FAQ
                                </div>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'faq.store', 'method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('question', 'Question') !!}
                                        {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Enter Question']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::label('answer', 'Answer') !!}
                                    {!! Form::textarea('answer', null, ['class' => 'form-control','rows'=>5, 'placeholder' => 'Enter Question']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 p-2 text-right">
                                    <button class="btn btn-sm btn-success">Create</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
