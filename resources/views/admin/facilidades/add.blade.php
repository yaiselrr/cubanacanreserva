@extends('layouts.admin')
@section('content')
    @include('admin.cancel', ['route'=>route('admin.nomenclator.facilidades.index')])
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear Facilidad</h3>
                    </div>
                    <div class="card-body">
                        <form id="addform" role="form" name="addform" method="post" enctype="multipart/form-data" action="{{route('admin.nomenclator.facilidades.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card card-dark card-tabs">
                                        <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-one-es-tab" data-toggle="pill" href="#custom-tabs-one-es" role="tab" aria-controls="custom-tabs-one-es" aria-selected="true"><img src="{{ asset('flags/es.png')}}" alt="flag" />&nbsp;&nbsp;ES</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill" href="#custom-tabs-one-en" role="tab" aria-controls="custom-tabs-one-en" aria-selected="false"><img src="{{ asset('flags/us.png')}}" alt="flag" />&nbsp;&nbsp;EN</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-fr-tab" data-toggle="pill" href="#custom-tabs-one-fr" role="tab" aria-controls="custom-tabs-one-fr" aria-selected="false"><img src="{{ asset('flags/fr.png')}}" alt="flag" />&nbsp;&nbsp;FR</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-de-tab" data-toggle="pill" href="#custom-tabs-one-de" role="tab" aria-controls="custom-tabs-one-de" aria-selected="false"><img src="{{ asset('flags/de.png')}}" alt="flag" />&nbsp;&nbsp;DE</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-it-tab" data-toggle="pill" href="#custom-tabs-one-it" role="tab" aria-controls="custom-tabs-one-it" aria-selected="false"><img src="{{ asset('flags/it.png')}}" alt="flag" />&nbsp;&nbsp;IT</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-pt-tab" data-toggle="pill" href="#custom-tabs-one-pt" role="tab" aria-controls="custom-tabs-one-pt" aria-selected="false"><img src="{{ asset('flags/pt.png')}}" alt="flag" />&nbsp;&nbsp;PT</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-one-es" role="tabpanel" aria-labelledby="custom-tabs-one-es-tab">
                                                    <div class="form-group @error('facilidad_es') has-error @enderror">
                                                        <label class="control-label" for="facilidad_es">Facilidad<small class="required" style="color: red"> *</small></label>
                                                        <input type="text" class="form-control @error('facilidad_es') is-invalid @enderror" value="{{ old('facilidad') }}" name="facilidad_es" placeholder="Facilidad">
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('facilidad_es')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('facilidad_en') has-error @enderror">
                                                            <label class="control-label" for="facilidad_en">Facilidad{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('facilidad_en') is-invalid @enderror" value="{{ old('facilidad') }}" name="facilidad_en" placeholder="Facilidad">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('facilidad_en')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-fr" role="tabpanel" aria-labelledby="custom-tabs-one-fr-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('facilidad_fr') has-error @enderror">
                                                            <label class="control-label" for="facilidad_fr">Facilidad{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('facilidad_fr') is-invalid @enderror" value="{{ old('facilidad') }}" name="facilidad_fr" placeholder="Facilidad">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('facilidad_fr')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-de" role="tabpanel" aria-labelledby="custom-tabs-one-de-tab">
                                                    <div class="form-group @error('facilidad_de') has-error @enderror">
                                                        <label class="control-label" for="facilidad_de">Facilidad{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                        <input type="text" class="form-control @error('facilidad_de') is-invalid @enderror" value="{{ old('facilidad') }}" name="facilidad_de" placeholder="Facilidad">
                                                        <!--<span class="error-container" style="color: red"></span>-->
                                                        @error('facilidad_de')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-it" role="tabpanel" aria-labelledby="custom-tabs-one-it-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('facilidad_it') has-error @enderror">
                                                            <label class="control-label" for="facilidad_it">Facilidad{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('facilidad_it') is-invalid @enderror" value="{{ old('facilidad') }}" name="facilidad_it" placeholder="Facilidad">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('facilidad_it')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-pt" role="tabpanel" aria-labelledby="custom-tabs-one-pt-tab">
                                                    <div class="box-body">
                                                        <div class="form-group @error('facilidad_pt') has-error @enderror">
                                                            <label class="control-label" for="facilidad">Facilidad{{--<small class="required" style="color: red"> *</small>--}}</label>
                                                            <input type="text" class="form-control @error('facilidad_pt') is-invalid @enderror" value="{{ old('facilidad') }}" name="facilidad_pt" placeholder="Facilidad">
                                                            <!--<span class="error-container" style="color: red"></span>-->
                                                            @error('facilidad_pt')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
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
                                        <button type="submit" class="btn btn-app"> <i class="fas fa-save"></i>Guardar</button>
                                        <a type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-cancel"><i class="fas fa-times-circle"></i>Cancelar</a>
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