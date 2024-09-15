@extends('front.app')
@section('content')
    <section>
        <div class="bg-holder bg-size"
            style="background-image:url('../assets/front/img/gallery/hero-bg.png');background-size:cover;">
        </div>
    </section>


    <section class="py-5">
        <div class="bg-holder bg-size"
            style="background-image:url(assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="locale text-center mb-5 ">
                <button class="btn btn-white btn-sm" onclick="showContent('en')">en</button>
                <button class="btn btn-white btn-sm" onclick="showContent('np')">np</button>
            </div>


            <div class="row">
                <div class="col text-center text-md-start">
                    <div id="contentToShow">
                        <div class="english" style="display:show">
                            <h2>{{ $page->title['en'] }}</h2>
                            <hr>
                            <p>{!! $page->description['en'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection


<script>
    function showContent(language) {
        var contentContainer = document.getElementById('contentToShow');
        if (language === 'en') {
            contentContainer.innerHTML =
                '<h2>{{ $page->title['en'] }}</h2>' +
                '<p>{{ $page->description['en'] }}</p>';
        } else if (language === 'np') {
            contentContainer.innerHTML =
                '<h2>{{ $page->title['np'] }}</h2>' +
                '<p>{{ $page->description['np'] }}</p>';
        }
    }
</script>
