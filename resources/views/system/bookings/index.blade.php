<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/book.css') }}">
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('assets/front/css/theme.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

</head>

<body>
    @include('sweetalert::alert')

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
        data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand text-dark" href="/">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                </span></button>
            <div class="collapse navbar-collapse border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                    @foreach ($menus as $item)
                    <li class="nav-item px-2"><a class="nav-link"
                        href="#departments">{{ $item->name }}</a></li>
                    @endforeach
                </ul><a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4"
                    href="/login">Sign In</a>
            </div>
        </div>
    </nav>
    </div>
    {{-- </nav> --}}


    <section class="mt-0" id="">
        <div class="bg-holder bg-size"
            style="background-image:url('../assets/front/img/gallery/hero-bg.png');background-size:cover;">
        </div>
        <div class="dept">
            <div class="container p-3">
                <h2>Departments</h2>
                <div class="row mt-4">
                    @foreach ($departments as $department)
                        <div class="col-md-4">
                            <a href="{{ route('booking.show', $department->id) }}">
                                <div class="card">
                                    <div class="card-header ">
                                        <div class="card-title">
                                            <h4>{{ $department->department_name }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-center">{{ $department->doctor_count }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/js/nepali.datepicker.v4.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/doctorForm.js') }}"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
        type="text/javascript"></script>
</body>

</html>
