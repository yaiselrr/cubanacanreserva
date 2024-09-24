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
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos, viaje a la medida.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
    @if(count($viajesmedidas)==0)

        <div class="col-md-12 no-data">No hay viajes disponibles</div>
    @else
    <div class="row mb-2" id="bloques1">
        @foreach($viajesmedidas as $viajesmedida)
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="form-group" style="margin: 0">
                        <strong class="d-inline-block mb-2" style="color: #DA2513">{{$viajesmedida->nombre}}</strong>
                        <img src="{{asset('/storage/'.$viajesmedida->imagen)}}" style="width: 100%">
                        <p>{!! nl2br(html_entity_decode( $viajesmedida->descripcion)) !!}</p>
                        <a class="btn btn-light btn-block botonestotalpago" style="background: #DA2513;color: #fff">RESERVAR</a>
                        <a href="{{route('home.detalle-viajes-medida', $viajesmedida->id)}}" class="stretched-link ">
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    @endif
@endsection
