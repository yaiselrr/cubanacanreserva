@if(isset($vistaflexiflydrive)=='Si')
    <div class="row col-md-12" align="center">
        <img src="{{asset('assets/img/productos, flexi fly and drive.png')}}">
    </div>
    @include('layouts.fronts.botonesproductos')
@else
    <div class="row col-md-12" align="center">
        /*<img src="{{asset('assets/img/excursiones home.png')}}">*/
    </div>
@endif
@if($contenido == null)
    <div class="no-data">No se encontraron datos</div>
@else
    <div class="row mb-2" id="bloques1">
        <div class="col-md-12" id="flexyintro">
            <p>

            </p>
            <br>
            {!!html_entity_decode($contenido->descripcion_general)!!}
            <p>
                <a target="self" href="{{ asset('/storage/'.$contenido->fichero_informacion_ampliada) }}">CONSULTAR
                    INFORMACION AMPLIADA DEL FLEXI FLY &amp; DRIVE</a>
            </p>
            {!!html_entity_decode($contenido->descripcion_hoteles)!!}
            <a id='hotelinfo' target="self" href="{{ asset('/storage/'.$contenido->fichero_listado_hoteles) }}">Consultar
                listado de Hoteles.</a>
            </br> </br> </br>
            {!!html_entity_decode($contenido->descripcion_autos)!!}
        </div>
    </div>
    <div class="row  mb-2" id="bloques1">
        <div class="col-md-12" align="center">
            <img class="img-responsive" src="{{asset('/storage/'.$contenido->imagen)}}" style="align:center;">
        </div>
    </div>
    <div class="row mb-2" id="bloques1">
        <div class="col-md-12">
            @include('home.formularios.formflexiflydrive.create')
        </div>
    </div>
@endif
