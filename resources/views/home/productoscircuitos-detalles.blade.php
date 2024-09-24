@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    @include('layouts.fronts.delete_datos_cliente')
    @include('layouts.fronts.delete_habitaciones')
    @include('layouts.fronts.carousel')
    @include('layouts.fronts.buscarProductos')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos,circuitos.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
    <div class="row mb-2" id="bloques1">
        <div class="row col-md-12">
            <div class="col-md-4">
                <img src="{{ asset('imagen/circuitos/'.$circuito->imagen) }}" style=" width: 300px; height: 210px;">
                <div>
                    <a href="{{ asset('detalle/circuitos/'.$circuito->detalles) }}"
                       download="download/{{$circuito->detalles}}"><img
                                src="{{asset('assets/img/Ver itinerario en circuito pasivo.png')}}"
                                style="width: 300px;"></a>
                </div>
            </div>
            <div class="col-md-4" style="margin-left: -100px;">
                <h5><b style="color: #DA2513;">{{ $data['nombre_es'] }}</b></h5>
                <p><b>Modalidad: </b>{{ $circuito->modalidad->nombre }}</p>
                <div class="d-inline-block mb-2 "><b>Duración: </b> {{ $circuito->duracions_id }} días
                    y {{ $circuito->duracions_id-1 }} noches
                </div>
                <p><b>Itinerario:</b> {{ $data['itinerario_es'] }}</p>
                <p><b>Idioma:</b></p>
                <p><b>Frecuencia:</b> {{ $circuito->frecuencia->nombre }}</p>
                <div class="d-inline-block mb-2 "><b>Precio: </b> Desde USD {{ $circuito->precio_desde }}.00</div>
            </div>

            <div class="col-md-4" style="height: 200px;">
                <h5>Descripción</h5>
                <p>{{ $data['descripcion_es'] }}</p>
            </div>
        </div>
    </div>



    <img src="{{ asset('mapa/circuitos/'.$circuito->imagen) }}"
         style="width: 1500px; height: 300px;margin-left: 5px;margin-bottom: 50px;">
    <form id="addform" role="form" method="post" enctype="multipart/form-data"
          action="{{ route('home.reservar-circuito',$circuito->id)}}">
        @csrf
        <div class="col-md-12 mb-4">
            <div name="ofertas_disponibles" id="ofertas_disponibles">
            </div>
        </div>

        <div class="row  mb-2" id="bloques1">
            <div class="col-md-12">

                <div id="ocultar_listado_habitaciones">
                    <div class="row mb-2" id="bloques1" style="margin-top: -25px">
                        <strong style="color: #2A4660">Introdusca la información requerida para realizar su
                            reserva: <div style="color: red;"> Primeramente la fecha y el idioma</div></strong>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 mb-4">
                            <div class="form-group @error('fecha_entrada') has-error @enderror">
                                <label>Fecha de Entrada:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <input type="hidden" value="{{$dias_antelacion->dias}}" name="dias_antelacion"
                                       id="dias_antelacion">
                                <input type="date" class="form-control @error('fecha_entrada') is-invalid @enderror"
                                       name="fecha_entrada" id="fecha_entrada" min="{{  $circuito->fecha_inicio }}"
                                       max="{{  $circuito->fecha_fin }}">
                                <span class=" invalid-feedback" id="error_fecha_entrada"></span>

                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-group @error('idioma_id') has-error @enderror">
                                <label>Idioma:
                                    <small class="required" style="color: red"> *</small>
                                </label>
                                <select class="form-control select2bs4 @error('idioma_id') is-invalid @enderror"
                                        name="idioma_id" id="idioma">
                                    <option value="">--Seleccione Idioma--</option>
                                    @if($circuito->es){
                                    <option value="{{$circuito->es}}">Español</option>
                                    }
                                    @endif
                                    @if($circuito->en){
                                    <option value="{{$circuito->es}}">Inglés</option>
                                    }
                                    @endif
                                    @if($circuito->dt){
                                    <option value="{{$circuito->es}}">Alemán</option>
                                    }
                                    @endif
                                    @if($circuito->fr){
                                    <option value="{{$circuito->es}}">Francés</option>
                                    }
                                    @endif
                                    @if($circuito->it){
                                    <option value="{{$circuito->es}}">Italiano</option>
                                    }
                                    @endif
                                    @if($circuito->pt){
                                    <option value="{{$circuito->es}}">Portugués</option>
                                    }
                                    @endif
                                </select>
                                <span class=" invalid-feedback" id="error_idioma"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">

                        <div class="col-md-5 ">
                            <img src="{{asset('assets/img/RESERVAR HABITACIONES.png')}}">
                        </div>
                        <ul class="list-inline ml-auto">
                            <li class="list-inline-item">
                                <a id="btn_vista_habitacion_datos_clientes" type="button"
                                   class="btn btn-light botones"
                                   style="background: #fff;color: #2A4660;border-color: #2A4660;">Adicionar</a>
                            </li>
                            <li class="list-inline-item">
                                <a type="button" class="btn botones disabled" id="btn_modificar_habitacion"
                                   style="background: #DA2513;color: #fff;">Modificar</a>
                            </li>
                            <li class="list-inline-item">
                                <a type="button" class="btn botones disabled" id="btn_abrir_modal_habitaciones"
                                   style="background: #DA2513;color: #fff;">Eliminar</a>
                            </li>

                        </ul>
                    </div>
                    <table class="table table-bordered table-hover text-center" id="listado_habitaciones">
                        <thead>
                        <tr>
                            <th hidden>No.</th>
                            <th>Tipo de Habitación</th>
                            <th>Adultos</th>
                            <th>Niños de 2 a 12</th>
                            <th>Niños de 0 a 2</th>
                            <th>Precio</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="row col-md-12">{{--
                            <input type="hidden" id="total_inicial_pagar" value="{{$totalapagar}}">--}}
                        <input type="hidden" id="precio_total" name="precio_total" value="0">
                        <a class="btn btn-light botonestotalpago  mb-2" id="total_pago"
                           style="background: #DA2513;color: #fff;">Total a pagar 0
                            USD</a>
                        <ul class="list-inline   ml-auto">
                            <li class="list-inline-item mb-2">
                                <a type="button" href="" id="btn_cancelar_detalle_excursion"
                                   class="btn btn-light botones"
                                   style="background: #fff;color: #2A4660;border-color: #2A4660;">Cancelar</a>
                            </li>
                            <li class="list-inline-item mb-2">
                                <a type="submit" class="btn botones" value="Add" id="btn_reservar_habitacion"
                                   style="background: #DA2513;color: #fff">Reservar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @include('home.formularios.form')


        </div>
    </form>
    </div>
@endsection
<style>
    .selected {
        cursor: pointer;
    }

    .seleccionada {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
    }

    .color:required {
        border: 1px solid #DA2513;
    }

    .hide-tab {
        display: none;
    }
</style>
@section('jscript')
    <script src="{{ asset('assets/js/cir.js')}}"></script>
@endsection