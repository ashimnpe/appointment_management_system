<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/book.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container">
            @include('sweetalert::alert')

            {{-- left nav --}}
            <div>
                <ul class="navbar-nav">
                    <li>
                        <a class="navbar-brand" href="/">AMS</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/" class="nav-link ">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('booking.index') }}" class="nav-link active">Book Appointment</a>
                    </li>
                </ul>
            </div>

            {{-- right nav --}}
            <div class="admin-login">
                <ul class="navbar-nav">
                    <li>
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

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

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/js/nepali.datepicker.v4.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/doctorForm.js') }}"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
        type="text/javascript"></script>
</body>

</html>
