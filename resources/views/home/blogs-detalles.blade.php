@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    <div class="row col-md-12" align="center" style="margin-top: 20px;margin-left: 20px;">
        <img src="{{asset('assets/img/blog.png')}}">
    </div>
    
        <div class="card" style="margin-top: 30px; margin-left: 20px;">
        <br style="padding: 20px;">
        <div class="col-md-10">
            <h4><b style="color: #868686">{{ $data['nombre_es'] }}</b></h4>
            
        </div>
        <div class="col-md-10">
            <img src="{{ asset('imagen/blogs/'.$blog->imagen) }}" style=" width: 400px; height: 300px;">
            
        </div>
    <div class="col-md-10">
        <p class="card-text" style="color: #868686"><i class="far fa-calendar-alt" style="color: #868686"></i> Fecha de Publicación: {{ $blog->fecha_publicacion }}</p>
    </div>


    <div class="col-md-12">
        <p>{{ $data['descripcion_es'] }}</p>
    </div>
    </div>
    </div>
        

@endsection
