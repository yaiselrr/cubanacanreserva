@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.clientes.index')])
    <!-- Main content -->
    <section class="content">
        <form action="{{ url('admin.content.clientes.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos Clientes</h3>
                        </div>
                        <div class="card-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h5><i class="icon fas fa-check"></i> Atención lea las siguientes indicaciones</h5>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif

                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Circuitos</label>
                                        <select class="form-control select2bs4 {{ $errors->has('circuitos_id')?'is-invalid':'' }}" id="circuitos_id" name="circuitos_id" >
                                            <option value="">--Seleccionar--</option>

                                            @foreach ($circuitos as $key => $c)
                                                <option value="{{ $c->circuitos_id }}">{{ $c->nombre }}</option>

                                            @endforeach
                                        </select>{!! $errors->first('circuitos_id', '<div class="invalid-feedback">:message</div>') !!}

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nombre:*</label>


                                        <input type="text" class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}"
                                               name="nombre"
                                               id="nombre" value="{{ old('nombre') }}"
                                               placeholder="Nombre">
                                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>


                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <label for="apaterno">1er Apellido:*</label>
                                        <input type="text" class="form-control {{ $errors->has('apaterno')?'is-invalid':'' }}" name="apaterno" id="apaterno"
                                               value="{{ old('apaterno') }}" placeholder="er Apellido">{!! $errors->first('apaterno', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="amaterno">2do Apellido:*</label>
                                        <input type="text" class="form-control {{ $errors->has('amaterno')?'is-invalid':'' }}" name="amaterno" id="amaterno"
                                               value="{{ old('amaterno') }}" placeholder="2do Apellido">{!! $errors->first('amaterno', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="pasaporte">Pasaporte:*</label>
                                        <input type="text" class="form-control {{ $errors->has('pasaporte')?'is-invalid':'' }}" name="pasaporte" id="pasaporte"
                                               value="{{ old('pasaporte') }}" placeholder="Pasaporte">{!! $errors->first('pasaporte', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nacionalidad</label>
                                        <select class="form-control select2bs4 {{ $errors->has('nacionalidad_id')?'is-invalid':'' }}" id="nacionalidad_id" name="nacionalidad_id" >
                                            <option value="">--Seleccionar--</option>

                                            @foreach ($nacionalidades as $key => $c)
                                                <option value="{{ $c->id }}">{{ $c->nacionalidad }}</option>

                                            @endforeach
                                        </select>{!! $errors->first('nacionalidad_id', '<div class="invalid-feedback">:message</div>') !!}

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Fecha Nacimiento</label>
                                        <input type="date" class="form-control {{ $errors->has('fecha')?'is-invalid':'' }}" name="fecha"
                                               id="fecha" value="{{ old('fecha') }}"
                                        >{!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer fa-pull-right">
                                <div class="pull-right">

                                    <button type="submit" class="btn btn-app"> <i class="fas fa-save"></i>Guardar</button>
                                    <a data-toggle="modal" data-target="#modal-cancel" class="btn btn-app">
                                        <i class="fas fa-times-circle"></i> Cancelar
                                    </a>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </form>
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection