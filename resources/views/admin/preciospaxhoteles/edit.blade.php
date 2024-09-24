@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.precios-pax-hotel.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Precios Pax por temporada del Hotel</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" role="form" method="post" enctype="multipart/form-data"
                              action="{{route('admin.content.precios-pax-hotel.update',$preciopaxhotel->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('hotel') has-error @enderror">
                                                    <label class="control-label" for="hotel">Hotel
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <script>
                                                        let hoteles = [];
                                                        let dias_antelacion = [];

                                                        @foreach ($dias_antelacion as $dias )
                                                        dias_antelacion.push(@json($dias));
                                                        @endforeach

                                                        @foreach ($hoteles as $hotele )
                                                        hoteles.push(@json($hotele));
                                                        @endforeach
                                                    </script>
                                                    <select
                                                        class="form-control select2bs4 @error('hotel') is-invalid @enderror"
                                                        id="hotel_id" name="hotel_id">
                                                        <option value="">--Seleccionar--</option>
                                                        @foreach($hoteles as $hotele)
                                                            @if($hotele->id == $preciopaxhotel->hotel_id)
                                                                <option value="{{$hotele->id}}"
                                                                        selected>{{$hotele->nombre}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$hotele->id}}">{{$hotele->nombre}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('hotel')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group @error('fecha_inicio') has-error @enderror">
                                                    <label class="control-label" for="fecha_inicio">Fecha Inicio
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="date" name="fecha_inicio"
                                                           class="form-control @error('fecha_inicio') is-invalid @enderror"
                                                           id="fecha_inicio"
                                                           value="{{ old('fecha_inicio',$preciopaxhotel->fecha_inicio) }}"
                                                           placeholder="Fecha Inicio">
                                                    <span class="invalid-feedback" id="error_fecha_inicio"></span>
                                                    @error('fecha_inicio')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group @error('fecha_fin') has-error @enderror">
                                                    <label class="control-label" for="fecha_fin">Fecha Fin
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="date" name="fecha_fin"
                                                           class="form-control @error('fecha_fin') is-invalid @enderror"
                                                           id="fecha_fin"
                                                           value="{{ old('fecha_fin',$preciopaxhotel->fecha_fin) }}"
                                                           placeholder="Fecha Fin">
                                                    <span class="invalid-feedback" id="error_fecha_fin"></span>
                                                    @error('fecha_fin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div
                                                    class="form-group @error('cantidad_hab_sencillas') has-error @enderror">
                                                    <label class="control-label" for="precio_ninnos_12annos">Cantidad
                                                        habitaciones sencillas
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="cantidad_hab_sencillas"
                                                           class="form-control @error('cantidad_hab_sencillas') is-invalid @enderror"
                                                           value="{{ old('cantidad_hab_sencillas',$preciopaxhotel->cantidad_hab_sencillas) }}"
                                                           placeholder="Cantidad habitaciones sencillas">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('cantidad_hab_sencillas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div
                                                    class="form-group @error('cantidad_hab_dobles') has-error @enderror">
                                                    <label class="control-label" for="cantidad_hab_dobles">Cantidad
                                                        habitaciones dobles
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="cantidad_hab_dobles"
                                                           class="form-control @error('cantidad_hab_dobles') is-invalid @enderror"
                                                           value="{{ old('cantidad_hab_dobles',$preciopaxhotel->cantidad_hab_dobles) }}"
                                                           placeholder="Cantidad habitaciones dobles">
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('cantidad_hab_dobles')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div
                                                    class="form-group @error('cantidad_hab_triples') has-error @enderror">
                                                    <label class="control-label" for="cantidad_hab_triples">Cantidad
                                                        habitaciones triples
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <input type="text" name="cantidad_hab_triples"
                                                           class="form-control @error('cantidad_hab_triples') is-invalid @enderror"
                                                           value="{{ old('cantidad_hab_triples',$preciopaxhotel->cantidad_hab_triples) }}"
                                                           placeholder="Cantidad habitaciones triples">
                                                    </input>
                                                    <!--<span class="error-container" style="color: red"></span>-->
                                                    @error('cantidad_hab_triples')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            <h3 class="card-title">Precios x Pax:</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="checkbox">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="check1"
                                                           name="variante2adultos_hasta2ninnos_2a12annos"
                                                           @if(old('variante2adultos_hasta2ninnos_2a12annos',$preciopaxhotel->variante2adultos_hasta2ninnos_2a12annos)==1
                                                           || old('variante2adultos_hasta2ninnos_2a12annos',$preciopaxhotel->variante2adultos_hasta2ninnos_2a12annos)==='on')
                                                           checked @endif>
                                                    <label for="check1" class="custom-control-label">Variante 2 adultos
                                                        y hasta 2 niños de 2 a 12 año</label>
                                                </div>
                                                @error('variante2adultos_hasta2ninnos_2a12annos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_adulto_variante2adultos') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_adulto_variante2adultos">Precio adulto
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_adulto_variante2adultos"
                                                                   name="precio_adulto_variante2adultos"
                                                                   class="form-control @error('precio_adulto_variante2adultos') is-invalid @enderror"
                                                                   value="{{ old('precio_adulto_variante2adultos',$preciopaxhotel->precio_adulto_variante2adultos) }}"
                                                                   disabled="disabled" placeholder="Precio adulto">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_adulto_variante2adultos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_1er_ninno_variante2adultos') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_1er_ninno_variante2adultos">Precio primer
                                                            niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_1er_ninno_variante2adultos"
                                                                   name="precio_1er_ninno_variante2adultos"
                                                                   class="form-control @error('precio_1er_ninno_variante2adultos') is-invalid @enderror"
                                                                   value="{{ old('precio_1er_ninno_variante2adultos',$preciopaxhotel->precio_1er_ninno_variante2adultos) }}"
                                                                   disabled="disabled" placeholder="Precio primer niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_1er_ninno_variante2adultos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_2do_ninno_variante2adultos') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_2do_ninno_variante2adultos">Precio segundo
                                                            niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_2do_ninno_variante2adultos"
                                                                   name="precio_2do_ninno_variante2adultos"
                                                                   class="form-control @error('precio_2do_ninno_variante2adultos') is-invalid @enderror"
                                                                   value="{{ old('precio_2do_ninno_variante2adultos',$preciopaxhotel->precio_2do_ninno_variante2adultos) }}"
                                                                   disabled="disabled"
                                                                   placeholder="Precio segundo niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_2do_ninno_variante2adultos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <p><span class="help-block">Nota: En caso de que el niño sea gratis escriba  el número Cero en el campo.</span>
                                            </p>
                                            <div class="checkbox">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="check2"
                                                           name="variante1adulto_hasta3ninnos_2a12annos"
                                                           @if(old('variante1adulto_hasta3ninnos_2a12annos',$preciopaxhotel->variante1adulto_hasta3ninnos_2a12annos)==1
                                                            || old('variante1adulto_hasta3ninnos_2a12annos',$preciopaxhotel->variante1adulto_hasta3ninnos_2a12annos)==='on')
                                                           checked @endif>
                                                    <label for="check2" class="custom-control-label">Variante 1 adulto y
                                                        hasta 3 niños de 2 a 12 años</label>
                                                </div>
                                                @error('variante1adulto_hasta3ninnos_2a12annos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_adulto_variante1adulto') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_adulto_variante1adulto">Precio adulto
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_adulto_variante1adulto"
                                                                   name="precio_adulto_variante1adulto"
                                                                   class="form-control @error('precio_adulto_variante1adulto') is-invalid @enderror"
                                                                   value="{{ old('precio_adulto_variante1adulto',$preciopaxhotel->precio_adulto_variante1adulto) }}"
                                                                   disabled="disabled" placeholder="Precio adulto">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>

                                                        </div>
                                                        @error('precio_adulto_variante1adulto')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_1er_ninno_variante1adulto') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_1er_ninno_variante1adulto">Precio primer niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_1er_ninno_variante1adulto"
                                                                   name="precio_1er_ninno_variante1adulto"
                                                                   class="form-control @error('precio_1er_ninno_variante1adulto') is-invalid @enderror"
                                                                   value="{{ old('precio_1er_ninno_variante1adulto',$preciopaxhotel->precio_1er_ninno_variante1adulto) }}"
                                                                   disabled="disabled" placeholder="Precio primer niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_1er_ninno_variante1adulto')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_2do_ninno_variante1adulto') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_2do_ninno_variante1adulto">Precio segundo
                                                            niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_2do_ninno_variante1adulto"
                                                                   name="precio_2do_ninno_variante1adulto"
                                                                   class="form-control @error('precio_2do_ninno_variante1adulto') is-invalid @enderror"
                                                                   value="{{ old('precio_2do_ninno_variante1adulto',$preciopaxhotel->precio_2do_ninno_variante1adulto) }}"
                                                                   disabled="disabled"
                                                                   placeholder="Precio segundo niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_2do_ninno_variante2adultos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_3er_ninno_variante1adulto') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_3er_ninno_variante1adulto">Precio tercer niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" id="precio_3er_ninno_variante1adulto"
                                                                   name="precio_3er_ninno_variante1adulto"
                                                                   class="form-control @error('precio_3er_ninno_variante1adulto') is-invalid @enderror"
                                                                   value="{{ old('precio_3er_ninno_variante1adulto',$preciopaxhotel->precio_3er_ninno_variante1adulto) }}"
                                                                   disabled="disabled" placeholder="Precio tercer niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_3er_ninno_variante1adulto')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <p><span class="help-block">Nota: En caso de que el niño sea gratis escriba  el número Cero en el campo.</span>
                                            </p>
                                            <div class="checkbox">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="check3"
                                                           name="variante2adultos_2hasta3ninnos_2a12annos"
                                                           @if(old('variante2adultos_2hasta3ninnos_2a12annos',$preciopaxhotel->variante2adultos_2hasta3ninnos_2a12annos)==1
                                                           || old('variante2adultos_2hasta3ninnos_2a12annos',$preciopaxhotel->variante2adultos_2hasta3ninnos_2a12annos)==='on')
                                                           checked @endif>
                                                    <label for="check3" class="custom-control-label">Variante 2 adultos
                                                        y de 2 a 3 niños de 2 a 12 años en otra habitación
                                                        contigua</label>
                                                </div>
                                                @error('variante2adultos_2hasta3ninnos_2a12annos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_adulto_variante2adultos_2hasta3ninnos') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_adulto_variante2adultos_2hasta3ninnos">Precio
                                                            adulto
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text"
                                                                   id="precio_adulto_variante2adultos_2hasta3ninnos"
                                                                   name="precio_adulto_variante2adultos_2hasta3ninnos"
                                                                   class="form-control @error('precio_adulto_variante2adultos_2hasta3ninnos') is-invalid @enderror"
                                                                   value="{{ old('precio_adulto_variante2adultos_2hasta3ninnos',$preciopaxhotel->precio_adulto_variante2adultos_2hasta3ninnos) }}"
                                                                   disabled="disabled" placeholder="Precio adulto">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_adulto_variante2adultos_2hasta3ninnos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_adulto_variante2adultos_2hasta3ninnos">Precio
                                                            primer niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text"
                                                                   id="precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos"
                                                                   name="precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos"
                                                                   class="form-control @error('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos') is-invalid @enderror"
                                                                   value="{{ old('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos',$preciopaxhotel->precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos) }}"
                                                                   disabled="disabled" placeholder="Precio primer niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div
                                                        class="form-group @error('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos">Precio
                                                            segundo niño
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text"
                                                                   id="precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos"
                                                                   name="precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos"
                                                                   class="form-control @error('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos') is-invalid @enderror"
                                                                   value="{{ old('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos',$preciopaxhotel->precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos) }}"
                                                                   disabled="disabled"
                                                                   placeholder="Precio segundo niño">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div
                                                    class="form-group @error('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos') has-error @enderror">
                                                    <label class="control-label"
                                                           for="precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos">Precio
                                                        tercer niño
                                                        <small class="required" style="color: red"> *</small>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text"
                                                               id="precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos"
                                                               name="precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos"
                                                               class="form-control @error('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos') is-invalid @enderror"
                                                               value="{{ old('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos',$preciopaxhotel->precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos) }}"
                                                               disabled="disabled" placeholder="Precio tercer niño">
                                                        </input>
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>
                                                    @error('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <p><span class="help-block">Nota: En caso de que el niño sea gratis escriba  el número Cero en el campo.</span>
                                            </p>
                                            <div class="checkbox">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="check4"
                                                           name="variante3adultos_mismahabitacion"
                                                           @if(old('variante3adultos_mismahabitacion',$preciopaxhotel->variante3adultos_mismahabitacion)==1
                                                           || old('variante3adultos_mismahabitacion',$preciopaxhotel->variante3adultos_mismahabitacion)==='on')
                                                           checked @endif>
                                                    <label for="check4" class="custom-control-label">Variante 3 adultos
                                                        alojados todos en una habitación</label>
                                                </div>
                                                @error('variante3adultos_mismahabitacion')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div
                                                        class="form-group @error('precio_adulto_variante3adultos_mismahabitacion') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_adulto_variante3adultos_mismahabitacion">Precio
                                                            adulto
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text"
                                                                   id="precio_adulto_variante3adultos_mismahabitacion"
                                                                   name="precio_adulto_variante3adultos_mismahabitacion"
                                                                   class="form-control @error('precio_adulto_variante3adultos_mismahabitacion') is-invalid @enderror"
                                                                   value="{{ old('precio_adulto_variante3adultos_mismahabitacion',$preciopaxhotel->precio_adulto_variante3adultos_mismahabitacion) }}"
                                                                   disabled="disabled" placeholder="Precio adulto">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_adulto_variante3adultos_mismahabitacion')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="check5"
                                                           name="variante1adulto_mismahabitacion"
                                                           @if(old('variante1adulto_mismahabitacion',$preciopaxhotel->variante1adulto_mismahabitacion)==1
                                                            || old('variante1adulto_mismahabitacion',$preciopaxhotel->variante1adulto_mismahabitacion)==='on')
                                                           checked @endif>
                                                    <label for="check5" class="custom-control-label">Variante 1 adulto
                                                        alojado solo en una habitación</label>
                                                </div>
                                                @error('variante1adulto_mismahabitacion')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div
                                                        class="form-group @error('precio_adulto_variante1adulto_mismahabitacion') has-error @enderror">
                                                        <label class="control-label"
                                                               for="precio_adulto_variante1adulto_mismahabitacion">Precio
                                                            adulto
                                                            <small class="required" style="color: red"> *</small>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text"
                                                                   id="precio_adulto_variante1adulto_mismahabitacion"
                                                                   name="precio_adulto_variante1adulto_mismahabitacion"
                                                                   class="form-control @error('precio_adulto_variante1adulto_mismahabitacion') is-invalid @enderror"
                                                                   value="{{ old('precio_adulto_variante1adulto_mismahabitacion',$preciopaxhotel->precio_adulto_variante1adulto_mismahabitacion) }}"
                                                                   disabled="disabled" placeholder="Precio adulto">
                                                            </input>
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        @error('precio_adulto_variante1adulto_mismahabitacion')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pull-right float-right">
                                        <button type="submit" class="btn btn-app"><i class="fas fa-save"></i>Guardar
                                        </button>
                                        <a type="button" class="btn btn-app" data-toggle="modal"
                                           data-target="#modal-cancel"><i class="fas fa-times-circle"></i>Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('jscript')
    <script>
        $(document).ready(function () {

            //primer checkbox
                @if(old('variante2adultos_hasta2ninnos_2a12annos',$preciopaxhotel->variante2adultos_hasta2ninnos_2a12annos)==1
                || old('variante2adultos_hasta2ninnos_2a12annos',$preciopaxhotel->variante2adultos_hasta2ninnos_2a12annos)==='on')
            {
                document.getElementById('precio_adulto_variante2adultos').disabled = "";
                document.getElementById('precio_1er_ninno_variante2adultos').disabled = "";
                document.getElementById('precio_2do_ninno_variante2adultos').disabled = "";
            }
            @endif
            //segundo checkbox
                @if(old('variante1adulto_hasta3ninnos_2a12annos',$preciopaxhotel->variante1adulto_hasta3ninnos_2a12annos)==1
                 || old('variante1adulto_hasta3ninnos_2a12annos',$preciopaxhotel->variante1adulto_hasta3ninnos_2a12annos)==='on')
            {
                document.getElementById('precio_adulto_variante1adulto').disabled = "";
                document.getElementById('precio_1er_ninno_variante1adulto').disabled = "";
                document.getElementById('precio_2do_ninno_variante1adulto').disabled = "";
                document.getElementById('precio_3er_ninno_variante1adulto').disabled = "";
            }
            @endif
            //tercer checkbox
                @if(old('variante2adultos_2hasta3ninnos_2a12annos',$preciopaxhotel->variante2adultos_2hasta3ninnos_2a12annos)==1
                || old('variante2adultos_2hasta3ninnos_2a12annos',$preciopaxhotel->variante2adultos_2hasta3ninnos_2a12annos)==='on')
            {

                document.getElementById('precio_adulto_variante2adultos_2hasta3ninnos').disabled = "";
                document.getElementById('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos').disabled = "";
                document.getElementById('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos').disabled = "";
                document.getElementById('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos').disabled = "";
            }
            @endif
            //carto checkbox
                @if(old('variante3adultos_mismahabitacion',$preciopaxhotel->variante3adultos_mismahabitacion)==1
               || old('variante3adultos_mismahabitacion',$preciopaxhotel->variante3adultos_mismahabitacion)==='on')
            {
                document.getElementById('precio_adulto_variante3adultos_mismahabitacion').disabled = "";
            }
            @endif
            //quinto checkbox
                @if(old('variante1adulto_mismahabitacion',$preciopaxhotel->variante1adulto_mismahabitacion)==1
               || old('variante1adulto_mismahabitacion',$preciopaxhotel->variante1adulto_mismahabitacion)==='on')
            {
                document.getElementById('precio_adulto_variante1adulto_mismahabitacion').disabled = "";
            }
            @endif
        });

        let diasantelacion = 0;
        $('#hotel_id').on('change', function () {
            var hotelid =document.getElementById('hotel_id');
            let hotel = "";

            if (hotelid.value != '') {
                $('#fecha_inicio').prop('disabled', false);
                $('#fecha_fin').prop('disabled', false);
                $('#fecha_inicio').val('');
                $('#fecha_fin').val('');

                $.each(hoteles, function (i, item) {
                    if (item['id'] == hotelid.value) {
                        hotel = item;
                    }
                });

                $.each(dias_antelacion, function (i, item) {
                    if (item['id'] == hotel.dias_antelacion_reserva_id) {
                        diasantelacion = item['dias'];
                    }
                });
            } else {
                $('#fecha_inicio').val('');
                $('#fecha_fin').val('');
                $('#fecha_inicio').prop('disabled',true);
                $('#fecha_fin').prop('disabled', true);
                $('#fecha_fin').removeClass('is-invalid');
                $('#error_fecha_fin').html('');
                $('#fecha_inicio').removeClass('is-invalid');
                $('#error_fecha_inicio').html('');
            }
        })

        $("#fecha_inicio").on("input", function () {

            $('#fecha_fin').removeClass('is-invalid');
            $('#error_fecha_fin').html('');
            $('#fecha_fin').val('');
            $('#fecha_inicio').removeClass('is-invalid');
            $('#fecha_inicio').html('');
        });

        $("#fecha_fin").on("input", function () {
            var fecha_total = new Date($('#fecha_inicio').val() + 'T00:00:00');
            var fecha_fin = new Date($('#fecha_fin').val());
            console.log(diasantelacion);

            if ($('#fecha_inicio').val() != "") {
                fecha_total.setDate(fecha_total.getDate() + diasantelacion);

                if (fecha_fin <= fecha_total) {

                    $('#fecha_fin').addClass('is-invalid');
                    $('#error_fecha_fin').html('');
                    $('#error_fecha_fin').append('La fecha seleccionada no cumple con los parámetros mínimos para la reserva. Mínimo ' + diasantelacion + ' días de antelación');
                    $('#fecha_inicio').removeClass('is-invalid');
                    $('#error_fecha_inicio').html('');
                } else {
                    $('#fecha_fin').removeClass('is-invalid');
                    $('#error_fecha_fin').html('');
                }
            } else {

                $('#fecha_inicio').addClass('is-invalid');
                $('#error_fecha_inicio').html('');
                $('#error_fecha_inicio').append('Debe seleccionar primero una fecha de incio.');
                $('#fecha_fin').val('');
            }

        });
    </script>
@endsection
