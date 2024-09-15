@extends('front.app')
@section('content')
    <div class="content-wrapper">
        <section>
            <div class="bg-holder bg-size"
                style="background-image:url('../assets/front/img/gallery/hero-bg.png');background-size:cover;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body p-2 d-flex">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/front/img/contact.jpg') }}" alt="" class="w-75">
                            </div>

                            <div class="col-md-6">
                                {!! Form::open(['route' => 'contact.store', 'method' => 'post']) !!}
                                <div class="col  m-2">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Full Name') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control p-2', 'placeholder' => 'Enter Full Name']) !!}
                                    </div>
                                </div>
                                <div class="col  m-2">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control  p-2', 'placeholder' => 'Enter Email Address']) !!}
                                    </div>
                                </div>
                                <div class="col  m-2">
                                    <div class="form-group">
                                        {!! Form::label('contact', 'Contact') !!}
                                        {!! Form::text('contact', null, ['class' => 'form-control  p-2', 'placeholder' => 'Enter Contact Number']) !!}
                                    </div>
                                </div>
                                <div class="col  m-2">
                                    <div class="form-group">
                                        {!! Form::label('feedback', 'Feedback') !!}
                                        {!! Form::textarea('feedback', null, ['class' => 'form-control  p-2', 'rows' => 5]) !!}
                                    </div>
                                </div>
                                <div class="col  m-2 text-center">
                                    <button class="btn btn-sm btn-success w-50">Send Inquiry</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
