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
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
