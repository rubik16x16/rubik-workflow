@extends('admin.template')

@section('content')

<form action="{{ route('admin.herramientas.update', ['id'=> $herramienta->id]) }}" method="post">
  {{ csrf_field() }}
	@method('PUT')
  <div class="form-group">
    <label for="id">Id</label>
    <input type="text" name="id" class="form-control" id="id" placeholder="id" value="{{ $herramienta->id }}" required>
  </div>
  <div class="form-group">
    <label for="color">Color</label>
    <input type="color" name="color" class="form-control" id="color" value="{{ $herramienta->color }}" required>
  </div>
  <div class="form-group">
    <label for="tipoHerramienta">Tipo de Herramienta</label>
    <select class="form-control" name="tipo_herramienta_id" id="tipoHerramienta">
      @foreach($tipoHerramientas as $tipoHerramienta)
				@if($tipoHerramienta->id == $herramienta->tipo->id)
					<option value="{{ $tipoHerramienta->id }}" selected>{{ $tipoHerramienta->nombre }}</option>
				@else
      		<option value="{{ $tipoHerramienta->id }}">{{ $tipoHerramienta->nombre }}</option>
				@endif
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
