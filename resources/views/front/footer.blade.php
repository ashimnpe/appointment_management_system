<section class="py-0 bg-secondary">
    <div class="bg-holder opacity-25"
        style="background-image:url('../assets/front/img/gallery/dot-bg.png');background-position:top left;margin-top:-3.125rem;background-size:auto;">
    </div>

    <div class="container">
        <div class="row py-8">
            <div class="col-md-5"><a class="text-decoration-none" href="#">
                    <h1>Young Minds Creation</h1>
                </a>
                <p class="text-light my-4">The world's most trusted company.</p>
                <h5 class="lh-lg fw-bold mb-1 text-light font-sans-serif">Contact Info</h5>
                <ul class="list-unstyled mb-md-4 mb-lg-0">
                    <li class=""><a class="footer-link" href="#!">Young Minds Tower, Prayag Chowk,
                            Shantinagar</li>
                    <li class=""><a class="footer-link" href="#!">Kathmandu, Nepal</a></li>
                    <li class=""><a class="footer-link" href="#!">Phone: (977) 1 4115132</a></li>
                    <li class=""><a class="footer-link"
                            href="https://www.youngminds.com.np/">https://www.youngminds.com.np</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5 class="lh-lg fw-bold mb-1 text-light font-sans-serif">Quick Links</h5>
                <ul class="list-unstyled mb-md-4 mb-lg-0">
                    @foreach ($menus as $item)
                        @if ($item->status == '1')
                            @if ($item->type == '1')
                                <li class="nav-item px-2"><a class="nav-link"
                                        href="{{ $item->module->title }}">{{ $item->name }}</a></li>
                            @elseif($item->type == '2')
                                <li class="nav-item px-2"><a class="nav-link"
                                        href="{{ route('dynamic',$item->id)}}">{{ $item->name }}</a></li>
                            @else
                                <li class="nav-item px-2"><a class="nav-link"
                                        href="{{ $item->external_link }}">{{ $item->name }}</a></li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8779871642914!2d85.34108177500002!3d27.69016572624989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199225ddb01b%3A0x5bdcec622a9c4d75!2sYoung%20Minds%20Creation%20(P)%20Ltd!5e0!3m2!1sen!2snp!4v1702313527804!5m2!1sen!2snp"
                    width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <section class="py-0 bg-primary">
        <div class="container">
            <div class="row justify-content-md-between justify-content-evenly py-4">
                <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
                    <p class="fs--1 my-2 fw-bold text-200">All rights Reserved &copy; Young Minds Creation Pvt. Ltd.
                        2023</p>
                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <p class="fs--1 my-2 text-center text-md-end text-200"> Made with&nbsp;
                        <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12"
                            height="12" fill="#F95C19" viewBox="0 0 16 16">
                            <path
                                d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                            </path>
                        </svg>&nbsp;by&nbsp;<a class="fw-bold text-info" href="#">Y.M.C. </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</section>
</main>

{{-- <script src="vendors/@popperjs/popper.min.js"></script> --}}
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/is/is.min.js"></script>
<script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('assets/front/js/theme.js') }}"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Fjalla+One&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100&amp;display=swap"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>
