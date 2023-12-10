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

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400,700" rel="stylesheet">

    <link href="{{ asset('assets/front/css/theme.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container">
            {{-- left nav --}}
            @include('sweetalert::alert')

            <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
                data-navbar-on-scroll="data-navbar-on-scroll">
                <div class="container"><a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                        </span></button>
                    <div class="collapse navbar-collapse border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                            <li class="nav-item px-2"><a class="nav-link" href="/">Departments</a></li>
                            <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="/">About
                                    Us</a>
                            </li>
                            <li class="nav-item px-2"><a class="nav-link"
                                    href="{{ route('booking.index') }}">Appointment</a></li>
                        </ul>
                        <a class="btn btn-bg btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4"
                            href="{{ route('login') }}">Sign In</a>
                        <a class="btn btn-bg btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4"
                            href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </nav>
        </div>
    </nav>

    <section class="mt-0" id="">
        <div class="bg-holder bg-size"
            style="background-image:url('../assets/front/img/gallery/hero-bg.png');background-size:cover;">
        </div>

        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

        <div class="dept mt-0">
            <div class="container">
                {{ $errors }}
                <div class="row">
                    @foreach ($doctors as $doctor)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="profile-user-img img-fluid img-circle d-flex"
                                        src="{{ asset($doctor->image) }}" alt="profile">
                                    <p class="text-bold">{{ $doctor->first_name }}</p>
                                    <p>
                                        {{ $doctor->specialization }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header text-bold">
                                    Available Schedule

                                </div>

                                <div class="card-body">
                                    @forelse ($doctor->schedule->groupBy('book_date_bs') as $date => $schedulesByDate)
                                        @if (
                                            $schedulesByDate->first()->book_date_ad == $dateFormat['today'] ||
                                                $schedulesByDate->first()->book_date_ad == $dateFormat['tomorrow']
                                        )
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {{ $date }}
                                                </div>
                                                <div class="col-md-9 p-2">
                                                    <div class="row">
                                                        @foreach ($schedulesByDate as $item)
                                                            @if ($item->status != 'booked')
                                                                <div class="col-md-4">
                                                                    <button class="btn btn-primary btn-sm m-1"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-lg{{ $item->id }}">{{ $item->start_time . ' - ' . $item->end_time }}</button>
                                                                </div>
                                                            @else
                                                                <div class="col-md-4">
                                                                    <button
                                                                        class="btn btn-primary btn-sm m-1 not-allowed"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-lg{{ $item->id }}"
                                                                        disabled>{{ $item->start_time . ' - ' . $item->end_time }}</button>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif

                                        {{-- Modal Box --}}
                                        @foreach ($schedulesByDate as $schedule)
                                            <div class="modal fade" id="modal-lg{{ $schedule->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <form action="{{ route('booking.store') }}" method="POST"
                                                        id="myForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success">
                                                                <h5 class="modal-title">Book Appointment</h5>
                                                                <div class="row float-right text-bold">
                                                                    <div class="col">
                                                                        Time:
                                                                        {{ $schedule->start_time . ' - ' . $schedule->end_time }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <input type="hidden" name="doctor_id"
                                                                        value="{{ $schedule->doctor->id }}">
                                                                    <input type="hidden" name="schedule_id"
                                                                        value="{{ $schedule->id }}">
                                                                    <input type="hidden" name="book_date_bs"
                                                                        id="schedule_data_bs"
                                                                        value="{{ $schedule->book_date_bs }}">
                                                                    <input type="hidden" name="book_date_ad"
                                                                        id="schedule_data_ad"
                                                                        value="{{ $schedule->book_date_ad }}">
                                                                    <input type="hidden" name="start_time"
                                                                        value="{{ $schedule->start_time }}">
                                                                    <input type="hidden" name="end_time"
                                                                        value="{{ $schedule->end_time }}">
                                                                    <input type="hidden" name="status"
                                                                        value="booked">
                                                                </div>



                                                                <div class="row">
                                                                    <div class="col form-group"><label
                                                                            for="name">Name</label>
                                                                        <input type="text" placeholder="Full Name"
                                                                            class="form-control" name="name">
                                                                        @error('name')
                                                                            <p class="text-danger">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="email" placeholder="Email"
                                                                            class="form-control" name="email">
                                                                        @error('email')
                                                                            <p class="text-danger">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col form-group">
                                                                        <label for="date">Date of
                                                                            Birth</label>
                                                                        <input type="text"
                                                                            class="form-control nepali-datepicker"
                                                                            id="modal_dob{{ $schedule->id }}"
                                                                            name="dob_bs"
                                                                            placeholder="Date of Birth">
                                                                        @error('dob_bs')
                                                                            <p class="text-danger">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col form-group" hidden>
                                                                        <input type="date"
                                                                            id="modal_dob_ad{{ $schedule->id }}"
                                                                            name="dob_ad">
                                                                    </div>
                                                                    <div class="col form-group">
                                                                        <label for="Address">Gender</label> <br>
                                                                        <input type="radio" name="gender"
                                                                            id="male" value="Male"> Male
                                                                        <input type="radio" name="gender"
                                                                            id="female" value="Female">
                                                                        Female
                                                                        <input type="radio" name="gender"
                                                                            id="others" value="Others">
                                                                        Others
                                                                        @error('gender')
                                                                            <p class="text-danger">{{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col form-group">
                                                                        <label for="contact">Mobile
                                                                            Number</label>
                                                                        <input type="number"
                                                                            placeholder="Mobile Number"
                                                                            class="form-control" name="contact">
                                                                        @error('contact')
                                                                            <p class="text-danger">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col form-group">
                                                                        <label for="address">Address</label>
                                                                        <input type="text" placeholder="Address"
                                                                            class="form-control" name="address">
                                                                        @error('address')
                                                                            <p class="text-danger">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col form-group">
                                                                        <label for="remarks">Remarks: </label>
                                                                        <br>
                                                                        <textarea name="remarks" id="remarks" class="w-100" rows="3"></textarea>
                                                                        @error('remarks')
                                                                            <p class="text-danger">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                @if (config('services.recaptcha.key'))
                                                                    <div class="g-recaptcha" name="g-recaptcha"
                                                                        data-sitekey="{{ config('services.recaptcha.key') }}">
                                                                        {{ config('services.recaptcha.key') }}
                                                                    </div>
                                                                @endif

                                                            </div>



                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <button class="btn btn-success">Create</button>
                                                            </div>

                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('#modal_dob' + {{ $schedule->id }}).nepaliDatePicker({
                                                                        container: "#modal-lg" + {{ $schedule->id }},
                                                                        ndpYear: true,
                                                                        ndpMonth: true,
                                                                        ndpYearCount: 100
                                                                    })


                                                                    function modalBsToAd() {
                                                                        var bsDate = document.getElementById('modal_dob' + {{ $schedule->id }}).value;
                                                                        var englishDate = document.getElementById('modal_dob_ad' + {{ $schedule->id }});
                                                                        var adDate = NepaliFunctions.BS2AD(bsDate);
                                                                        englishDate.value = adDate;
                                                                    }

                                                                    setInterval(() => {
                                                                        modalBsToAd();
                                                                    }, 30);
                                                                });
                                                            </script>
                                                        </div>
                                                    </form>

                                                    {{-- <div class="spinner-border text-primary"  role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div> --}}

                                                    {{-- <div id="loadingSpinner" class="spinner" style="display: none;"></div>

                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#myForm').submit(function (e){
                                                                e.preventDefault();
                                                            })

                                                            $('#loadingSpinner').show();


                                                        });
                                                    </script> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @empty
                                        No Schedule Available
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>



    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('assets/js/nepali.datepicker.v4.0.1.min.js') }}"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>

</html>
