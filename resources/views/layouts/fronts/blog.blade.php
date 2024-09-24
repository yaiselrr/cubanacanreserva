<div class="row col-md-12" align="center" style="margin-top: 20px;margin-left: 20px;">
    <img src="{{asset('assets/img/blog.png')}}">
</div>
@if(count($blogs)<=0)

    <div class="col-md-12 no-data">No hay publicaciones disponibles</div>
    @else
    {
    <div class="row mb-2" id="bloques1" align="center">
        @foreach($blogs as $c)
            <div class="col-md-5" style="margin-right: 100px;margin-bottom: 50px;" id="cuadro">
                <div class="card card-danger mb-4 shadow-sm">

                    <img class="img-responsive bloquethumb" style="width: 513px;height: 200px;"
                         src="{{ asset('imagen/blogs/'.$c->blog->imagen) }}">
                    <div class="card-body">
                        <p class="card-text" style="text-align: left;"><i class="far fa-calendar-alt"
                                                                          style="color: #868686"></i> <b
                                    style="color: #868686">{{ $c->blog->fecha_publicacion }}</b></p>
                        <p class="card-text " style="text-transform: uppercase;text-align: left;"><b
                                    style="color: #868686">{{ $c->titulo }}</b></p>
                        <p class="card-text" style="text-align: left;">{{ $c->descripcion }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            </div>
                            <a href="{{ route('home.detalles-blogs', $c->blogs_id) }}"><i
                                        class="fas fa-arrow-right" style="color: #868686"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    }
@endif

