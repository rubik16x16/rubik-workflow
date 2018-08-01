@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<form action="{{ route('admin.proyectos.herramientas.update', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}
	@method('PUT')
	<h2>Herramientas</h2>

	@foreach($coleccionesHerramientas as $coleccionHerramientas)
		@foreach($coleccionHerramientas as $tipoHerramienta => $herramientas)

		<h3>{{ $tipoHerramienta }}</h3>

			@foreach($herramientas as $herramienta)

			<div class="form-group form-check">
		  	<input type="checkbox" class="form-check-input" name="herramienta-{{ $herramienta->id }}" id="herramienta-{{ $herramienta->id }}" value="{{ $herramienta->id }}" @if($herramienta->checked) checked @endif>
		  	<label class="form-check-label" for="herramienta-{{ $herramienta->id }}">{{ $herramienta->id }}</label>
			</div>

			@endforeach
		@endforeach
	@endforeach

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
