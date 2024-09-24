@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    @include('layouts.fronts.carousel')
    @include('layouts.fronts.buscarProductos')
    <input type="text" id="success" value="{{$success}}" hidden>
    <div class="row" align="center">
        <img src="{{asset('assets/img/contacto.png')}}">
    </div>
    <div class="row col-md-12" id="bloques1">
        <div class="col-md-6">
            <h4 class="mb-0">¡CONTACTE CON NOSOTROS!</h4>
            <div
                class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
                style="margin-top: 20px">
                <div class="col p-4 d-flex flex-column position-static">
                    <form id="contactForm" role="form" method="post" enctype="multipart/form-data"
                          action="{{ route('home.sendMessage')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-group @error('nombre') has-error @enderror">
                                    <label for="caracteristicas">Nombre y Apellidos:</label>
                                    <input type="text" class="form-control  @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"
                                           placeholder="Categoría">
                                    @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group @error('email') has-error @enderror">
                                    <label for="caracteristicas">Email:</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                           placeholder="Email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group @error('mensaje') has-error @enderror">
                                    <label for="caracteristicas">Mensaje:</label>
                                    <textarea name="mensaje" class="form-control @error('mensaje') is-invalid @enderror"
                                              placeholder="Mensaje">{{ old('mensaje') }}</textarea>

                                    @error('mensaje')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 mb-4 ">
                                <div class="form-group">
                                    <button type="submit" class="btn botones" style="background: #DA2513;color: #fff;">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="mb-0">¡NUESTROS CLIENTES OPINAN!</h4>
            <div class="fb-comments" data-href="https://www.facebook.com/avcubanacan94" data-numposts="5" data-width=""></div>
{{--            <div--}}
{{--                class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"--}}
{{--                style="margin-top: 20px">--}}
{{--                <div class="col p-4 d-flex flex-column position-static">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <!-- Contenedor Principal -->--}}
{{--                            <div class="container">--}}
{{--                <span class="float-lg-left">--}}
{{--                          <a class="link-black text-sm">--}}
{{--                            <i class="far fa-comments mr-1"></i> Comments (5)--}}
{{--                          </a>--}}
{{--                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Ordenar por <span--}}
{{--                            class="caret"></span></button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <a href="#" class="dropdown-item">Top 10 comentarios</a>--}}
{{--                        <a href="#" class="dropdown-item">Más antiguos</a>--}}
{{--                    </div>--}}
{{--                </span>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="comments-container" style="margin-top: 15px">--}}
{{--                                <input class="form-control form-control-sm" type="text"--}}
{{--                                       placeholder="Agregar comentario...">--}}
{{--                                <ul id="comments-list" class="comments-list">--}}
{{--                                    <li>--}}
{{--                                        <div class="comment-main-level">--}}
{{--                                            <!-- Avatar -->--}}
{{--                                            <div class="comment-avatar">--}}
{{--                                                <img--}}
{{--                                                    src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg"--}}
{{--                                                    alt="">--}}
{{--                                            </div>--}}
{{--                                            <!-- Contenedor del Comentario -->--}}
{{--                                            <div class="comment-box">--}}
{{--                                                <div class="comment-head">--}}
{{--                                                    <h6 class="comment-name by-author"><a--}}
{{--                                                            href="http://creaticode.com/blog">Agustin--}}
{{--                                                            Ortiz</a></h6>--}}
{{--                                                    <span>hace 20 minutos</span>--}}
{{--                                                    <i class="fa fa-reply mr-1" data-toggle="tooltip"--}}
{{--                                                       title="Responder"></i>--}}
{{--                                                    <i class="fa fa-share mr-1" data-toggle="tooltip"--}}
{{--                                                       title="Compartir"></i>--}}
{{--                                                    <i class="fa fa-thumbs-up mr-1" data-toggle="tooltip"--}}
{{--                                                       title="Me gusta"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="comment-content">--}}
{{--                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit--}}
{{--                                                    omnis--}}
{{--                                                    animi et--}}
{{--                                                    iure laudantium vitae, praesentium optio, sapiente distinctio illo?--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- Respuestas de los comentarios -->--}}
{{--                                        <ul class="comments-list reply-list">--}}
{{--                                            <li>--}}
{{--                                                <!-- Avatar -->--}}
{{--                                                <div class="comment-avatar"><img--}}
{{--                                                        src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg"--}}
{{--                                                        alt=""></div>--}}
{{--                                                <!-- Contenedor del Comentario -->--}}
{{--                                                <div class="comment-box">--}}
{{--                                                    <div class="comment-head">--}}
{{--                                                        <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena--}}
{{--                                                                Rojero</a></h6>--}}
{{--                                                        <span>hace 10 minutos</span>--}}
{{--                                                        <i class="fa fa-reply mr-1" data-toggle="tooltip"--}}
{{--                                                           title="Responder"></i>--}}
{{--                                                        <i class="fa fa-share mr-1" data-toggle="tooltip"--}}
{{--                                                           title="Compartir"></i>--}}
{{--                                                        <i class="fa fa-thumbs-up mr-1" data-toggle="tooltip"--}}
{{--                                                           title="Me gusta"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="comment-content">--}}
{{--                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit--}}
{{--                                                        omnis animi--}}
{{--                                                        et iure laudantium vitae, praesentium optio, sapiente distinctio--}}
{{--                                                        illo?--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="row" id="bloques1">
        <div class="col-md-6">
            <h4 class="mb-4">INFORMACIÓN DE CONTACTO</h4>
            <div class="mb-2">
                <i class="nav-icon fas fa-phone-alt" style="color: #DA2513"></i> {{$contacto->telefono}}
            </div>
            <hr>
            <div class="mb-2">
                <i class="nav-icon fas fa-map-marker-alt"
                   style="color: #DA2513"></i> @foreach($contactotraslations as $quienessomostraslation)
                    {{$quienessomostraslation->direccion}}
                @endforeach
            </div>
            <hr>
            <div class="mb-2">
                <i class="nav-icon fas fa-envelope" style="color: #DA2513"></i> {{$contacto->email}}
            </div>
            <hr>
        </div>
    </div>
@endsection

@section('jscript')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0&appId=711649245656959&autoLogAppEvents=1" nonce="OVqUwmnV"></script>
    <script>
        $(document).ready(function(){
            var show = $('#success').val();
            if (show) {
                swal.fire({
                    toast: true,
                    class: 'bg-success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4500,
                    type: 'success',
                    title: 'Gracias por contactar con nuestra Agencia, será un placer atenderlo.',
                });
            }
        });
    </script>
@endsection
