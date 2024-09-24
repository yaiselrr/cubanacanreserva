@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    <input type="text" id="success" value="{{$success}}" hidden>
    <div class="col-md-12" align="center" style="margin-top:50px">
        <img src="{{asset('assets/img/suscribirse.png')}}">
    </div>
    <div class="row col-md-12 mb-2" id="bloques1">
        <div class="col-md-12">
            <h4 class="mb-3" align="center">¡SUSCRIBASE A NUESTRO BOLETÍN!</h4>
        </div>
        <div class="no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-230 position-relative"
             style="margin-top: 20px;margin: auto">
            <div class="col p-4 d-flex flex-column position-static ">
                <form id="subscriptionForm" role="form" method="post" enctype="multipart/form-data"
                      action="{{ route('home.suscribirse')}}">
                    @csrf
                    <div class="row mb-2 " id="bloques1">
                        <div class="col-md-12">
                            <div class="row" style="margin-bottom: 50px;">
                                <div class="col-md-10">
                                    <div class="form-group @error('nombre') has-error @enderror">
                                        <label for="nombre">Nombre y Apellidos:</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                               name="nombre" value="{{ old('nombre') }}" placeholder="Nombre y Apellidos">

                                        @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group  @error('email') has-error @enderror">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                               placeholder="Email">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-10">
                                <ul class="list-inline   ml-auto">
                                    <li class="list-inline-item mb-2">
                                        <a href="" type="button" class="btn btn-light botones"
                                           style="background: #fff;color: #2A4660;border-color: #2A4660">Cancelar</a>
                                    </li>
                                    <li class="list-inline-item mb-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn botones"
                                                    style="background: #DA2513;color: #fff;">Aceptar
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
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
                   title: 'Gracias por suscribirse',
               });
           }
       });
    </script>
@endsection
