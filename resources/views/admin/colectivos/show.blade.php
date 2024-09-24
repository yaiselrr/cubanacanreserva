@extends('layouts.admin')

@section('content')

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		@foreach($tras as $bur)
			@if($bur)
		<h1 class="display-4">Nombre Completo: {{ $buro->nombre }}</h1>
		<p class="lead">Correo: {{ $buro->direccion }}</p>
			@endif
		@endforeach
		
	</div>

</div>
<a href="{{ route('admin.content.buros.index') }}" class="btn btn-secondary btn-sm" >Volver</a>

@endsection