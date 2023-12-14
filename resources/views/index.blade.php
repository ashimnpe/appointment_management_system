@extends('front.app')
@section('content')

@include('sweetalert::alert')


    <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size"
            style="background-image:url('../assets/front/img/gallery/hero-bg.png');background-position:top center;background-size:cover;">
        </div>
        <div class="container">
            <div class="row min-vh-xl-100 min-vh-xxl-25">
                <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"
                        src="{{ asset('assets/front/img/gallery/hero.png') }}" alt="hero-header" /></div>
                <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
                    <h1 class="fw-light font-base fs-6 fs-xxl-7">We're <strong>determined
                        </strong>for<br />your&nbsp;<strong>better life.</strong></h1>
                    <p class="fs-1 mb-5">You can get the care you need 24/7 – be it online or in <br />person. You
                        will be treated by caring specialist doctors. </p><a class="btn btn-lg btn-primary rounded-pill"
                        href="{{ route('booking.index') }}" role="button">Book Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="departments">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="bg-holder bg-size"
                        style="background-image:url('../assets/front/img/gallery/bg-departments.png'); background-position:top-center; background-size:contain;">
                    </div>
                    <h1 class="text-center">OUR DEPARTMENTS</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="py-0">
        <div class="container">
            <div class="row py-5 align-items-center ">
                @foreach ($departments as $department)
                    <div class="col-md-3">
                        <div class="card m-1 shadow mb-5 bg-body rounded dept">
                            <div class="card-body">
                                <div class="d-flex flex-column ">
                                    <p class="fs-1 text-center">
                                        {{ $department->department_name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-secondary">

        <div class="bg-holder"
            style="background-image:url('../assets/front/img/gallery/bg-eye-care.png');background-position:center;background-size:contain;">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-xxl-6"><img class="img-fluid"
                        src="{{ asset('assets/front/img/gallery/eye-care.png') }}" alt="..." /></div>

                <div class="col-md-7 col-xxl-6 text-center text-md-start">
                    <h2 class="fw-bold text-light mb-4 mt-4 mt-lg-0">Health Care with Top Professionals<br
                            class="d-none d-sm-block" />and In Budget.</h2>
                    <p class="text-light">We've built a healthcare system that puts your needs first.<br
                            class="d-none d-sm-block" />For us, there is nothing more important than the health of
                        <br class="d-none d-sm-block" />you and your loved ones.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="pb-0" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="bg-holder bg-size"
                        style="background-image:url('../assets/front/img/gallery/about-us.png');background-position:top center;background-size:contain;">
                    </div>
                    <h1 class="text-center">ABOUT US</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-lg-1 mb-5 mb-lg-0"><img class="fit-cover rounded-circle w-100"
                        src="{{ asset('assets/front/img/gallery/health-care.png') }}" alt="..."></div>
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-bold mb-4">We are developing a healthcare <br class="d-none d-sm-block">system
                        around you</h2>
                    <p>We think that everyone should have easy access to excellent <br class="d-none d-sm-block">healthcare.
                        Our aim is to make the procedure as simple as <br class="d-none d-sm-block">possible for our
                        patients and to offer treatment no matter<br class="d-none d-sm-block">where they are — in person or
                        at their convenience. </p>
                </div>
            </div>
        </div>

    </section>

    <section class="py-8 bg-secondary">
        <div class="container">
            <div class="row">
                <h1 class="text-center text-white text-uppercase">Feedback</h1>
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'feedback.store', 'method' => 'post']) !!}
                            <div class="row p-2">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Full Name') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control p-2', 'placeholder' => 'Enter Full Name']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::text('email', null, ['class' => 'form-control  p-2', 'placeholder' => 'Enter Email Address']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('contact', 'Contact') !!}
                                        {!! Form::text('contact', null, ['class' => 'form-control  p-2', 'placeholder' => 'Enter Contact Number']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('feedback', 'Feedback') !!}
                                        {!! Form::textarea('feedback', null, ['class' => 'form-control  p-2', 'rows' => 5]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2 mt-2 text-center">
                                <div class="col">
                                    <button class="btn btn-sm btn-success w-50">Send Inquiry</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" pb-5" id="about">
        <div class="container">
            <h1 class="text-center">FAQ's</h1>

            <div class="row align-items-center">
                @foreach ($faq as $key => $item)
                    <div class="col-lg-6">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item m-2">
                                <h2 class="accordion-header ">
                                    <button class="accordion-button bg-warning text-white p-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $key }}" aria-expanded="false"
                                        aria-controls="collapse{{ $key }}">
                                        {{ $item->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {{ $item->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

