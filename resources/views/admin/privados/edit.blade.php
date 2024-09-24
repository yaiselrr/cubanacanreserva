@extends('layouts.plantilla')

@section('content')
    @include('admin.cancel', ['route'=>route('admin.content.privados.index')])

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Traslado</h3>
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
                        <form action="{{ route('privados.update',$privado->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dias_antelacion">Días Antelación</label>
                                                    <select class="form-control" name="dias_antelacion"
                                                            id="dias_antelacion">
                                                        <option value="">--Seleccionar--</option>

                                                        @if($privado->dias_antelacion == 0)
                                                            <option value="0" selected>0</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="50">50</option>
                                                            <option value="80">80</option>
                                                            <option value="100">100</option>
                                                        @endif
                                                        @if($privado->dias_antelacion == 10)
                                                            <option value="0">0</option>
                                                            <option value="10" selected>10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="50">50</option>
                                                            <option value="80">80</option>
                                                            <option value="100">100</option>
                                                        @endif

                                                        @if($privado->dias_antelacion == 20)
                                                            <option value="0">0</option>
                                                            <option value="10">10</option>
                                                            <option value="20" selected>20</option>
                                                            <option value="30">30</option>
                                                            <option value="50">50</option>
                                                            <option value="80">80</option>
                                                            <option value="100">100</option>
                                                        @endif

                                                        @if($privado->dias_antelacion == 30)
                                                            <option value="0">0</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="30" selected>30</option>
                                                            <option value="50">50</option>
                                                            <option value="80">80</option>
                                                            <option value="100">100</option>
                                                        @endif

                                                        @if($privado->dias_antelacion == 50)
                                                            <option value="0">0</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="50" selected>50</option>
                                                            <option value="80">80</option>
                                                            <option value="100">100</option>
                                                        @endif

                                                        @if($privado->dias_antelacion == 80)
                                                            <option value="0">0</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="50">50</option>
                                                            <option value="80" selected>80</option>
                                                            <option value="100">100</option>
                                                        @endif

                                                        @if($privado->dias_antelacion == 100)
                                                            <option value="0">0</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="50">50</option>
                                                            <option value="80">80</option>
                                                            <option value="100" selected>100</option>
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tarifario</label>
                                                        <div class="input-group">
                                                            <input type="file" name="tarifario" id="tarifario"
                                                                   value="{{ $privado->tarifario }}"
                                                                   placeholder="Tarifario" class="custom-file-input">
                                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar
                                                                archivo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
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
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection