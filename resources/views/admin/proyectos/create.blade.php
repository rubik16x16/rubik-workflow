@extends('admin.template')

@section('content')

<form action="{{ route('admin.proyectos.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
  </div>

	@foreach($operadores as $operador)

	<div class="form-group form-check">
  	<input type="checkbox" class="form-check-input" name="operador-{{ $operador->id }}" id="operador-{{ $operador->id }}" value="{{ $operador->id }}">
  	<label class="form-check-label" for="operador-{{ $operador->id }}">{{ $operador->email }}</label>
	</div>

	@endforeach

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
