@extends('admin.template')

@section('content')

<form action="{{ route('admin.herramientas.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="id">Id</label>
    <input type="text" name="id" class="form-control" id="id" placeholder="id" required>
  </div>
  <div class="form-group">
    <label for="color">Color</label>
    <input type="color" name="color" class="form-control" id="color" required>
  </div>
  <div class="form-group">
    <label for="tipoHerramienta">Tipo de Herramienta</label>
    <select class="form-control" name="tipo_herramienta_id" id="tipoHerramienta">
      @foreach($tipoHerramientas as $tipoHerramienta)
      <option value="{{ $tipoHerramienta->id }}">{{ $tipoHerramienta->nombre }}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
