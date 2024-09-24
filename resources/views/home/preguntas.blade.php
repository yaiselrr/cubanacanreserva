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
            <img src="{{asset('assets/img/preguntas.png')}}">
    </div>
        <div class="rgba-black-strong py-5 px-4">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8">
                    <!--Accordion wrapper-->
                    @foreach($preguntas as $pregunta)
                    <div class="accordion md-accordion accordion-5" id="accordionEx5" role="tablist"
                         aria-multiselectable="true">
                        <div class="card mb-4">
                            <div class="card-header p-0 z-depth-1" role="tab" id="heading30" style="max-height:  38px">
                                <a data-toggle="collapse" data-parent="#accordionEx5" href="collapse30" data-target="#collapse30-{{$pregunta->id}}" aria-expanded="true"
                                   aria-controls="collapse30">
                                    <span class="input-group-text text-danger" style="background-color: #DA2513;max-height: 40px;max-width: 85px;margin-top: -1px" id="footer_text2">
                                        <i class="fas fa-plus-square fa-2x p-3 mr-4 float-left" style="color: #fff" aria-hidden="true" ></i><p style="color: #DA2513;margin-top: 15px">{{$pregunta->pregunta}}</p></span>
                                  {{--  <h4 class="text-uppercase white-text mb-0 py-3 mt-1">

                                    </h4>--}}
                                </a>
                            </div>
                            <div id="collapse30-{{$pregunta->id}}" class="collapse" role="tabpanel" aria-labelledby="heading30"
                                 data-parent="#accordionEx5" style="margin-top: -30px">
                                <div class="card-body rgba-black-light white-text z-depth-1">
                                    <p class="p-md-4">{!! nl2br(html_entity_decode( $pregunta->respuesta)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection