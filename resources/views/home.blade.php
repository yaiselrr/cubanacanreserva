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
    @include('layouts.fronts.circuitos')
    @include('layouts.fronts.excursiones')
    @include('layouts.fronts.hoteles')
   {{-- <main style="padding-top: 66px;min-height: 80%; background: white;">
        @yield('body')
    </main>--}}
   {{-- <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
            {{App\Modelos\PaginationMerger::merge($hoteles,$excursiones,$circuitos,4)}}
        </ul>
    </nav>--}}
    @include('layouts.fronts.carousel_tarjeta_enlace')
@endsection
