@extends('admin.template')

@section('content')

<form action="{{ route('admin.roles.update', ['id' => $rol->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ $rol->nombre }}">
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
