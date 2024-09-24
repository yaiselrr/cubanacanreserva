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
            <img src="{{asset('assets/img/servicios.png')}}">
    </div>
    <div class="col-md-12 mt-4">
        <p class="card-text mb-auto">
            @foreach($servicios as $servicio)
                {!! nl2br(html_entity_decode( $servicio->descripcion)) !!}
            @endforeach
        </p>
    </div>
    <div style="margin-top: 30px">

    </div>
@endsection