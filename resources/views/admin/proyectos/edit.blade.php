@extends('admin.template')

@section('content')

<form action="{{ route('admin.proyectos.update', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}
	@method('PUT')
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ $proyecto->nombre }}">
  </div>

	<label>Operadores</label>

	@foreach($operadores as $operador)

	<div class="form-group form-check">
  	<input type="checkbox" class="form-check-input" name="operador-{{ $operador->id }}" id="operador-{{ $operador->id }}" value="{{ $operador->id }}" @if($operador->checked) checked @endif>
  	<label class="form-check-label" for="operador-{{ $operador->id }}">{{ $operador->email }}</label>
	</div>

	@endforeach

	<label>Tipos de Herramientas</label>
	@foreach($tipoHerramientas as $tipoHerramienta)

	<div class="form-group form-check">
  	<input type="checkbox" class="form-check-input" name="tipoHerramienta-{{ $tipoHerramienta->id }}" id="tipoHerramienta-{{ $tipoHerramienta->id }}" value="{{ $tipoHerramienta->id }}" @if($tipoHerramienta->checked) checked @endif>
  	<label class="form-check-label" for="tipoHerramienta-{{ $tipoHerramienta->id }}">{{ $tipoHerramienta->nombre }}</label>
	</div>

	@endforeach
 <div class="row">
      <div class="col-md-12 pad-adjust">
      	LISTA DE HERRAMIENTAS
      
          <div id="listaherramientasApp">
            <tabla-lista-herramientas :herramientas="{{ $HerramientasPertenecientes }}" :routes="{{ $routes }}">
            </tabla-lista-herramientas>
          </div>
      <script src="{{ asset('dist/js/listaHerramientas/app.js') }}"></script>
    </div>
     </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
