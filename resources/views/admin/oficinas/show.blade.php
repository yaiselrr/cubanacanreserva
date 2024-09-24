@extends('layouts.admin')

@section('content')

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">Nombre Completo: {{ $data['nombre_es'] }}</h1>
		<p class="lead">Correo: {{ $data['direccion_es'] }}</p>
		<p class="lead">{{ $oficina->telefono }}</p>
	</div>

</div>
<a href="{{ route('admin.content.oficinas.index') }}" class="btn btn-secondary btn-sm" >Volver</a>

@endsection