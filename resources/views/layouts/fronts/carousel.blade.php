<section class="embed-responsive">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        @if(!$carousel1)

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-responsive" src="#"
                         alt="">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                         preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                        <rect width="100%" height="100%" fill="#777"></rect>
                    </svg>
                    <div class="container">

                        <div class="carousel-caption">
                            <h1>NO HAY IMAGEN DISPONIBLE</h1>

                        </div>
                    </div>
                </div>
            </div>

        @else

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-responsive" src="{{ asset('imagen/carruseles/'.$carousel1->carrusel->imagen) }}"
                         alt="">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                         preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                        <rect width="100%" height="100%" fill="#777"></rect>
                    </svg>
                    <div class="container">

                        <div class="carousel-caption">
                            <h1>{{ $carousel1->titulo }}</h1>
                        </div>
                    </div>
                </div>
                @foreach($carouseles as $c)

                    <div class="carousel-item">
                        <img class="img-responsive" src="{{ asset('imagen/carruseles/'.$c->carrusel->imagen) }}" alt="">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                             preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#777"></rect>
                        </svg>
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>{{ $c->titulo }}</h1>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>