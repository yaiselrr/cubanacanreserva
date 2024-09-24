@extends('layouts.fronts.assest')
@section('header')
    @include('layouts.fronts.header')
@endsection
@section('navbar')
    @include('layouts.fronts.navbar')
@endsection
@section('content')
    @include('layouts.fronts.delete_carrito_compra')
    <input type="hidden" id="mensaje" value="{{$success}}">
    <input type="hidden" id="mensajeeliminacion" value="0">
    <br>
    <br>
    <div class="col-md-12" align="center">
        <img src="{{asset('assets/img/mis reservas.png')}}">
    </div>
    <div class="row mb-2" id="bloques1">
        <div class="col-md-8">
            {{--<div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title">Warning Outline</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-sm" data-card-widget="collapse"><i class="fas fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm" data-card-widget="collapse"><i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn btn-sm" data-card-widget="collapse"><i class="fas fa-eye"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    The body of the card
                </div>
            </div>--}}
            @php
                $total  = 0;
            @endphp
            @if($carrito)
                @foreach($carrito as $details)
                    @php
                        $total += $details['total_precio'] ;
                    @endphp
                    <div class="accordion md-accordion accordion-5" id="accordionEx5" role="tablist"
                         aria-multiselectable="true">
                        <div class="card mb-4">
                            <div class="card-header p-3 z-depth-1 right" role="tab" id="heading30">
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong class="d-inline-block mb-2"
                                                style="color: #DA2513">{{$details['tipo_producto']}}
                                            : {{$details['nombre_producto']}}</strong>
                                    </div>
                                    {{--<div class="col-md-3">--}}
                                        {{--<strong class="d-inline-block mb-2">{{\Carbon\Carbon::parse($details['fecha'])->format('d/m/Y')  }}</strong>--}}
                                    {{--</div>--}}
                                    <div class="col-md-3">
                                        <strong class="d-inline-block mb-2">USD {{$details['total_precio']}}</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-sm" data-card-widget="collapse"><i
                                                    class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button id="btn_eliminar_producto" type="button" data-toggle="modal"
                                                data-target="#modal-delete-carrito" class="btn btn-sm"
                                                data-card-widget="collapse"
                                                data-route="{{route('home.eliminar-carrito', $details['idCarrito'])}}">
                                            <i
                                                    class="fas fa-trash"></i>
                                        </button>
                                        <button class="btn btn-sm" data-toggle="collapse"
                                                data-parent="#accordionEx5"
                                                href="collapse30"
                                                data-target="#collapse30-{{$details['idCarrito']}}"
                                                aria-expanded="true"
                                                aria-controls="collapse30">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse30-{{$details['idCarrito']}}" class="collapse " role="tabpanel"
                                 aria-labelledby="heading30"
                                 data-parent="#accordionEx5">
                                <div class="card-body rgba-black-light white-text z-depth-1">
                                    @if($details['tipo_producto']=='Circuito' ||
                                    $details['tipo_producto']=='Circuito')
                                        <strong class="p-md-4">Habitación {{$details['tipo_habitacion']}}:
                                            Adultos {{$details['cantAdultos']}},
                                            Niños {{$details['cantN212']}}, Infante {{$details['cantN02']}}</strong>
                                    @elseif($details['tipo_producto']=='Tranfer' )
                                        <strong class="p-md-4">
                                            Adultos {{$details['cantAdultos']}},
                                            Niños {{$details['cantN212']}}, Infante {{$details['cantN02']}}</strong>
                                    @elseif($details['tipo_producto']=='Excursion' )
                                        <strong class="p-md-4">Adultos {{$details['cantAdultos']}},
                                            Niños {{$details['cantN212']}}, Infante {{$details['cantN02']}}</strong>
                                    @elseif($details['tipo_producto']=='Evento' )
                                        <strong class="p-md-4">Hotel {{$details['nombre_hotel_evento']}}:
                                            <br>
                                            Habitación {{$details['tipo_habitacion']}}:
                                            Adultos {{$details['cantAdultos']}},
                                            Niños {{$details['cantN212']}}, Infante {{$details['cantN02']}}</strong>
                                    @elseif($details['tipo_producto']=='Viaje a la Medida' )
                                        <strong class="p-md-4">Adultos {{$details['cantAdultos']}},
                                            Niños {{$details['cantN212']}}, Infante {{$details['cantN02']}}</strong>
                                    @elseif($details['tipo_producto']=='Programa Flexi Fly Drive' )
                                         <strong class="p-md-4">Adultos {{$details['cantAdultos']}},
                                             Niños {{$details['cantN012']}}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="accordion md-accordion accordion-5" id="accordionEx5" role="tablist"
                     aria-multiselectable="true">
                    <div class="card mb-4">
                        <div class="card-header p-3 z-depth-1 right" role="tab" id="heading30">
                            <div class="text-center">
                                <strong class="d-inline-block mb-2 text-center">No hay productos añadidos al Carrito de
                                    compras.</strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    @if($carrito)
                        @if(count($carrito)==1)
                            <strong class="d-inline-block mb-2 text-center">
                                Importe Total ({{count($carrito)}} Producto)</strong>
                            <strong class="d-inline-block mb-2 text-center"> USD {{ $total }}</strong>
                        @else
                            <strong class="d-inline-block mb-2 text-center">
                                Importe Total ({{count($carrito)}} Productos)</strong>
                            <strong class="d-inline-block mb-2 text-center"> USD {{ $total }}</strong>
                        @endif
                    @else
                        <strong class="d-inline-block mb-2 text-center">
                            Importe Total (0 Productos)</strong>
                        <strong class="d-inline-block mb-2 text-center"> USD {{ $total }}</strong>
                    @endif
                </div>
                <a href="{{ route('home.payment') }}"  id="btn_do_payment" class="btn btn-light btn-block botonestotalpago" style="background: #DA2513;color: #fff;cursor:pointer;">REALIZAR PAGO</a>
            </div>
            <h4 class="mb-3" align="center" style="color: #DA2513">Nuestros productos</h4>
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.circuitos') }}" class="text-center">
                        @if(request()->routeIs('home.circuitos') || request()->routeIs('home.circuitos-habitaciones') ||
                         request()->routeIs('home.circuitos-datos') ||  request()->routeIs('home.detalles-circuitos'))
                            <img src="{{asset('assets/img/Boton circuitos activo.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/Boton circuitos pasivo.png')}}" style="width: 250px;">
                        @endif
                    </a>

                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.excursiones') }}" class="text-center">
                        @if(request()->routeIs('home.excursiones')|| request()->routeIs('home.detalles-excursiones'))
                            <img src="{{asset('assets/img/Boton excursiones activo.png')}}"
                                 style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/Boton excursiones pasivo.png')}}"
                                 style="width: 250px;">
                        @endif
                    </a>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.hoteles') }}" class="text-center">
                        @if(request()->routeIs('home.hoteles') || request()->routeIs('home.detalles-hotel'))
                            <img src="{{asset('assets/img/Boton hoteles activo.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/Boton hoteles pasivo.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.transfercolectivot') }}" class="text-center">
                        @if(request()->routeIs('home.transfercolectivot'))
                            <img src="{{asset('assets/img/transfercolectivoac.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/transfercolectivo.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.transferprivadot') }}" class="text-center">
                        @if(request()->routeIs('home.transferprivadot'))
                            <img src="{{asset('assets/img/transferprivadoac.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/transferprivado.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>

                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.trasladosconectandocubat') }}" class="text-center">
                        @if(request()->routeIs('home.trasladosconectandocubat'))
                            <img src="{{asset('assets/img/conectandoac.png')}}" style="width: 250px;">
                        @else

                            <img src="{{asset('assets/img/conectando.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>

                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.transfercolectivoprecio') }}" class="text-center">
                        @if(request()->routeIs('home.transfercolectivoprecio'))
                            <img src="{{asset('assets/img/transfercolectivoprecioac.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/transfercolectivoprecio.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.viajes-medida') }}" class="text-center">
                        @if(request()->routeIs('home.viajes-medida') || request()->routeIs('home.detalle-viajes-medida'))
                            <img src="{{asset('assets/img/BOTON 2B.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/BOTON 2A.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <a href="{{ route('home.flexyflydrive') }}" class="text-center">
                        @if(request()->routeIs('home.flexyflydrive'))
                            <img src="{{asset('assets/img/BOTON 1B.png')}}" style="width: 250px;">
                        @else
                            <img src="{{asset('assets/img/BOTON 1A.png')}}" style="width: 250px;">
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jscript')
    <script type="text/javascript">
        $(document).ready(
            mensajeAnnadido(),
            mensajeEliminacion(),
        )

        //Evento para eliminar una carrito de compra
        $('#btn_remove_carrito_compra').on('click', function (event) {
            event.preventDefault();
            var url = $('#btn_eliminar_producto').data('route');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                method: "DELETE",
                /*data: {
                   id: id_carrito,
                },*/
                /*contentType: false,
                cache: false,
                processData: false,*/
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        $('#modal-delete-carrito').modal('hide');
                        window.location.reload();
                        $('#mensajeeliminacion').val(1);
                        $('#mensaje').val(0);

                    }
                },
                error: function (data) {
                    if (data.responseJSON) {
                        /*cleanErrors();
                        $.each(data.responseJSON.errors, function (key, value) {
                            showErrors(key, value);
                        });*/
                    }
                }
            });
        });

        function mensajeEliminacion() {
            var messageeliminacion = $('#mensajeeliminacion').val();
            if (messageeliminacion == 1) {
                swal.fire({
                    toast: true,
                    class: 'bg-success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    type: 'success',
                    title: 'El producto del Carrito de Compra se ha eliminado satisfactoriamente',
                });
            }
        }

        function mensajeAnnadido() {
            var message =parseInt($('#mensaje').val());
            if (message >=1) {
                swal.fire({
                    toast: true,
                    class: 'bg-success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    type: 'success',
                    title: 'El producto del Carrito de Compra se ha adicionado satisfactoriamente.',
                });
                // toastr.success('El producto se ha añadido al Carrito de compras')
            }
        }
    </script>
@endsection