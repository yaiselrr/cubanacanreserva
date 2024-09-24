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
    @include('layouts.fronts.hoteles',['vistahoteles'=>'Si'])
        <input type="hidden" value="8" name="hotel">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                {{$hoteles->links('paginacion.pagination')}}
            </ul>
        </nav>
@endsection