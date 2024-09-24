@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')


    @include('layouts.fronts.blog')
    <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                {{$blogs->links()}}
            </ul>
        </nav>
    </div>
@endsection