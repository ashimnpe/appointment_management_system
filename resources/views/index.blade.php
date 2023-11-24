<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container">
            {{-- left nav --}}
            <ul class="navbar-nav">
                <li>
                    <a class="navbar-brand" href="/">AMS</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link active">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('booking.index') }}" class="nav-link">Book Appointment</a>
                </li>
            </ul>

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
    @include('sweetalert::alert')

    <div class="steps" id="steps">
        <div class="container">
            <h2 class="text-center py-4">How we works?</h2>
            <div class="row" style="display: ">
                <div class="col-md-4">
                    <div class="card process">
                        <div class="card-body">
                            <h1 class="num">1</h1>
                            <h4>Registration</h4>
                            <p>Patient can do registration from here with basic information.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card process">
                        <div class="card-body">
                            <h1 class="num">2</h1>
                            <h4>Make an Appointment</h4>
                            <p>Patient can book an appointment with doctor from landing page or from his login panel.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card process">
                        <div class="card-body">
                            <h1 class="num">3</h1>
                            <h4>Take Treatment</h4>
                            <p>Doctors can interact with patients and do related treatment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="appointment" class="appointment">
        <div class="container">
            <div class="bookus">
                <a href="{{ route('booking.index') }}"><button type="button" class="btn btn-primary btn-lg"> Book An
                        Appointment
                    </button></a>
            </div>
        </div>
    </div>

    {{-- modal patient --}}
    {{-- <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <form role="form" method="POST" action="{{ route('patient.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="patient-loginForm">
                        <div class="modal-title text-center">
                            <h3 class="mt-2">Book Us Now !!!</h3>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('patient.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Full Name" class="form-control"
                                            name="name" required>
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="email">Email</label>
                                        <input type="email" placeholder="Email" class="form-control" name="email">
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="text" class="form-control" placeholder="Date of Birth"
                                            name="dob_bs" id="nepali_date">
                                    </div>
                                    @error('dob_bs')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="col form-group" hidden>
                                        <label for="dob">English DOB</label>
                                        <input type="date" class="form-control" name="dob_ad" id="english_date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="gender">Gender</label> <br>
                                        <input type="radio" name="gender" id="male" value="Male"> Male
                                        <input type="radio" name="gender" id="female" value="Female"> Female
                                        <input type="radio" name="gender" id="others" value="Others"> Others
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="contact">Mobile Number</label>
                                        <input type="text" placeholder="Mobile Number" class="form-control"
                                            name="contact">
                                    </div>
                                    @error('contact')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Address" class="form-control"
                                            name="address">
                                    </div>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button class="btn btn-success btn-sm">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
    {{-- modal end patient --}}

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/js/nepali.datepicker.v4.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/doctorForm.js') }}"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
        type="text/javascript"></script>
</body>

</html>
