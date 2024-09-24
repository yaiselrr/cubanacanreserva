@extends('layouts.fronts.assest')
@section('css')
    <link href="{{ asset('assets/css/encuesta/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/encuesta/encuesta.css') }}" rel="stylesheet">
@endsection
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    {{--@include('admin.flash_msg')--}}

    @if(Session('success'))

        <div class="alert alert-success text_flash">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">
                <span class="span_close">x</span>
            </button>
            {!! Session('success') !!}
        </div>
    @endif

    @if(Session('error'))
        <div class="alert alert-danger text_flash">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">
                <span class="span_close">x</span>
            </button>
            {!! Session('error') !!}
        </div>
    @endif
    <div class="row row_content">
        <div class="col-md-12 col-sm-12" align="center">
            <label class="text_encuesta"> Encuesta </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <img class="mascota" src="{{asset('assets/img/mascota3.png')}}">
        </div>
        {{--párrafo de bienvenida--}}
        <div class="col-md-8 text_style">

            <p class="bottom">
                La agencia Viajes Cubanac&aacute;n se esfuerza por mejorar cada vez m&aacute;s sus servicios y
                productos
                con vista a lograr una mayor satisfacci&oacute;n de nuestros clientes. Su opini&oacute;n y
                comentarios pueden ayudarnos en este empeño.
            </p>

            <p>
                Por favor, invierta unos pocos minutos de su tiempo para rellenar esta encuesta.
            </p>
        </div>

        <div class="col-md-2">
            <img class="mascota" src="{{asset('assets/img/mascota2.png')}}">
        </div>
    </div>
    <form role="form" method="post" enctype="multipart/form-data" name="surveyForm"
          action="{{ route('home.encuesta-save-encuesta')}}">
        @csrf

        <div class="row row_Container">

            {{--fecha en la que viajo--}}
            {{--obligatorio--}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-mb-0 square">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="control-label">
                                                Fecha en la que viaj&oacute;:
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group" id="date_div_id">
                                    <input type="date" class="form-control" name="travelDate" id="date_id">
                                    {{--max="{{ $today }}"--}}
                                </div>
                                <span id="span_id_date_invalid" class="input_span_invalid" hidden>
                                        El campo fecha es obligatorio.
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Como la pasó--}}
            {{--Posibles valores--}}
            {{--Excelente, muy bien, regular  y mal obligatorio--}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-mb-0 square">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="control-label">
                                                ¿Como la pas&oacute;?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="how_to_pass_id">
                                <input hidden id="howToPassValueId" name="howToPassValue">
                                {{--EXCELENTE--}}
                                <button type="button" class="button_how_to_pass" data-value="4"
                                        id="how_to_pass_excelent">
                                    <img src="{{asset('imagen/encuesta/risa.png')}}">
                                </button>
                                {{--MUY BIEN--}}
                                <button type="button" class="button_how_to_pass" data-value="3">
                                    <img src="{{asset('imagen/encuesta/sin_palabras.png')}}">
                                </button>
                                {{--REGULAR--}}
                                <button type="button" class="button_how_to_pass" data-value="2">
                                    <img src="{{asset('imagen/encuesta/sonrojado.png')}}">
                                </button>
                                {{--MAL--}}
                                <button type="button" class="button_how_to_pass" data-value="1">
                                    <img src="{{asset('imagen/encuesta/triste.png')}}">
                                </button>
                            </div>
                            <span id="span_id_passed_invalid" class="input_span_invalid" hidden>
                                        El campo ¿C&oacute;mo la pas&oacute;? es obligatorio.
                                    </span>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Tipo de producto -- Producto --}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 div_container">
                        <div class="form-group">
                            <div class="row bottom_">
                                <div class="col-mb-0 square">
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">
                                        Valore nuestro producto:
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="tipoProductoDivID">
                                        <label class="control-label">
                                            Tipo de Producto
                                        </label>
                                        <select name="productType" id="product_type_id"
                                                class="form-control ajax_product">
                                            <option value="0">Seleccione</option>
                                            <option value="3">Hoteles</option>
                                            <option value="1">Circuitos</option>
                                            <option value="2">Excursiones</option>
                                            <option value="5">Flexi Fly & Drive</option>
                                            <option value="6">Eventos</option>
                                            <option value="7">Traslados</option>
                                            <option value="4">Viajes a la medida</option>
                                        </select>
                                    </div>
                                    <span id="span_id_type_of_invalid" class="input_span_invalid" hidden>
                                        El campo tipo de producto es obligatorio.
                                    </span>
                                </div>
                                {{--El select de producto se desactiva si es Flexy Fly (id 5) y Traslados (id 7)--}}
                                <div class="col-md-6">
                                    <div class="form-group" id="producto_div_id">
                                        <label class="control-label">
                                            Producto
                                        </label>
                                        <select name="product" class="form-control" id="product_id">
                                            <option value="0">Seleccione</option>
                                        </select>
                                    </div>
                                    <span id="span_id_product_invalid" class="input_span_invalid" hidden>
                                        El campo producto es obligatorio.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="label_style">Evaluaci&oacute;n</label>
                            </div>
                            {{--Clasificacion con estrellas--}}
                            <div class="col-md-12">
                                <input hidden name="rateValue" id="rateValueId">
                                <div class="row" id="id_rate_container" data-value="0">

                                </div>
                                <span id="span_id_rating_invalid" class="input_span_invalid" hidden>
                                        El campo evaluaci&oacute;n es obligatorio.
                                    </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Encuesta --}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 topMAS">
                        <p class="text_label_answer">Por favor conteste las siguientes preguntas seg&uacute;n su
                            experiencia
                            con nosotros: </p>
                    </div>

                    <div class="col-md-12">
                        @foreach($preguntas as $pregunta)
                            <div class="row margin_bottom">
                                <div class="col-md-4">
                                    <label>
                                        {{ $pregunta->pregunta }}
                                    </label>
                                </div>
                                <div class="col-md-8" style="display: inherit;"
                                     id="container_survey_id_{{$pregunta->id}}">
                                    <input hidden id="survey_test_{{$pregunta->id}}" name="{{ $pregunta->id }}">

                                    <div class="col-md-4" align="center">
                                        <button type="button" class="button_survey" data-value="3"
                                                data-question="{{ $pregunta->id }}"></button>
                                        <label class="label_survey_style">Si</label>
                                    </div>

                                    <div class="col-md-4" align="center">
                                        <button type="button" class="button_survey" data-value="2"
                                                data-question="{{ $pregunta->id }}"></button>
                                        <label class="label_survey_style">Debe mejorar </label>
                                    </div>

                                    <div class="col-md-4" align="center">
                                        <button type="button" class="button_survey" data-value="1"
                                                data-question="{{ $pregunta->id }}"></button>
                                        <label class="label_survey_style">No</label>
                                    </div>
                                </div>
                            </div>
                            <span id="span_id_survey_invalid_{{$pregunta->id}}" class="input_span_invalid" hidden>
                                        Las preguntas son obligatorias.
                                    </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--Que nos recomienda--}}
            <div class="col-md-12">
                <div class="form-group div_textarea_style">
                    <label class="control-label">
                        Que nos recomienda:
                    </label>
                    <textarea class="form-control" style="height: 150px;" name="recomendation" maxlength="500">
                    </textarea>
                </div>
            </div>

            {{--Boton Guardar--}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 div_button">
                        {{--class="button_style"--}}
                        <button class="btn botones button_form" type="button" id="reset_id">Cancelar</button>
                        <button class="btn botones button_form" type="submit" id="save_id">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <input id="utils_id" hidden data-path="{{route('home.encuesta-type-products')}}"
           data-url="{{ route('home') }}" data-size_questions="{{ count($preguntas) }}"
           data-json_questions="{{ $preguntas }}">
    @include('home.encuesta.modal_cancel')
@endsection
@section('jscript')
    <script src="{{ asset('assets/js/encuesta/encuesta.js') }}"></script>
@endsection