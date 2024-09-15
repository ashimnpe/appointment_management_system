<main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
        data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand text-primary" href="/">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                </span></button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
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

                </ul><a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4"
                    href="/login">Sign In</a>
            </div>
        </div>
    </nav>
