<section class="embed-responsive">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        {{--<ol class="carousel-indicators">--}}
            {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
            {{--<li data-target="#myCarousel" data-slide-to="1" class=""></li>--}}
            {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
        {{--</ol>--}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-responsive" src="{{asset('assets/img/u240.jpg')}}" alt="">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>
                <div class="container">

                    {{--<div class="carousel-caption">--}}
                        {{--<h1>Example headline.</h1>--}}
                        {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget--}}
                            {{--quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor--}}
                            {{--id nibh ultricies vehicula ut id elit.</p>--}}
                        {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>--}}
                    {{--</div>--}}
                </div>
            </div>
            {{--<div class="carousel-item">--}}
                {{--<img class="img-responsive" src="{{asset('assets/img/4.jpg')}}" alt="">--}}
                {{--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"--}}
                     {{--preserveAspectRatio="xMidYMid slice" focusable="false" role="img">--}}
                    {{--<rect width="100%" height="100%" fill="#777"></rect>--}}
                {{--</svg>--}}
                {{--<div class="container">--}}
                    {{--<div class="carousel-caption">--}}
                        {{--<h1>Another example headline.</h1>--}}
                        {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget--}}
                            {{--quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor--}}
                            {{--id nibh ultricies vehicula ut id elit.</p>--}}
                        {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="carousel-item">--}}
                {{--<img class="img-responsive" src="{{asset('assets/img/3.jpg')}}" alt="">--}}
                {{--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"--}}
                     {{--preserveAspectRatio="xMidYMid slice" focusable="false" role="img">--}}
                    {{--<rect width="100%" height="100%" fill="#777"></rect>--}}
                {{--</svg>--}}
                {{--<div class="container">--}}
                    {{--<div class="carousel-caption">--}}
                        {{--<h1>One more for good measure.</h1>--}}
                        {{--<p>Cras justo odio, dapibus ac facilisis in, egestas eget--}}
                            {{--quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor--}}
                            {{--id nibh ultricies vehicula ut id elit.</p>--}}
                        {{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        {{--<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">--}}
            {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Previous</span>--}}
        {{--</a>--}}
        {{--<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">--}}
            {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Next</span>--}}
        {{--</a>--}}
    </div>
    <div class="row" id="botones_tarjetas_enlace" style="text-align: center;">
        <div class="col-md-6">
            <button type="button" class="btn btn-light btn-lg btn-block">Tarjetas de Créditos</button>
            <img src="{{asset('assets/img/tarjetas de crédito.png')}}">
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-light btn-lg btn-block">Enlaces de Interés</button>
            @include('layouts.fronts.interesantes')
        </div>

    </div>
</section>
