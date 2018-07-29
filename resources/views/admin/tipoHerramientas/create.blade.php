@extends('admin.template')

@section('content')

<form action="{{ route('admin.tipoHerramientas.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
