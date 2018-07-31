@extends('admin.template')

@section('content')

<form action="{{ route('admin.proyectos.update', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}
	@method('PUT')
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ $proyecto->nombre }}">
  </div>

	@foreach($operadores as $operador)

	<div class="form-group form-check">
  	<input type="checkbox" class="form-check-input" name="operador-{{ $operador->id }}" id="operador-{{ $operador->id }}" value="{{ $operador->id }}" @if($operador->checked) checked @endif>
  	<label class="form-check-label" for="operador-{{ $operador->id }}">{{ $operador->email }}</label>
	</div>

	@endforeach

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
