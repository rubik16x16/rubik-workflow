@extends('admin.template')

@section('content')

<form action="{{ route('admin.tipoHerramientas.update', ['id' => $tipoHerramienta->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ $tipoHerramienta->nombre }}" required>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
