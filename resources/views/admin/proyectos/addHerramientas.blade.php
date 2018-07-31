@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<form action="{{ route('admin.proyectos.storeHerramientas', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}

	<label>Herramientas</label>

	@foreach($coleccionesHerramientas as $coleccionHerramientas)
		@foreach($coleccionHerramientas as $nombre => $herramientas)

		<label>{{ $nombre }}</label>

			@foreach($herramientas as $herramienta)

			<div class="form-group form-check">
		  	<input type="checkbox" class="form-check-input" name="herramienta-{{ $herramienta->id }}" id="herramienta-{{ $herramienta->id }}" value="{{ $herramienta->id }}">
		  	<label class="form-check-label" for="herramienta-{{ $herramienta->id }}">{{ $herramienta->email }}</label>
			</div>

			@endforeach
		@endforeach
	@endforeach

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
