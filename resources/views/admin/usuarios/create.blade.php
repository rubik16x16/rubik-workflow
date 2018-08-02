@extends('admin.template')

@section('content')

<form action="{{ route('admin.usuarios.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email">
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="password" name="clave" class="form-control" id="clave" placeholder="clave">
  </div>

  <label>Roles</label>
  <div class="form-group">
    @foreach($roles as $rol)
    <div class="form-check form-check-inline">
      <input class="form-check-input" name="rol-{{ $rol->id }}" type="checkbox" id="rol-{{ $rol->id }}" value="{{ $rol->id }}">
      <label class="form-check-label" for="{{ $rol->nombre }}">{{ $rol->nombre }}</label>
    </div>
    @endforeach
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
