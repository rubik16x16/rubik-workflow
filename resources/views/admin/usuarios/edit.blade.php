@extends('admin.template')

@section('content')

<form action="{{ route('admin.usuarios.update', ['id' => $usuario->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email" value="{{ $usuario->email }}" required>
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="password" name="clave" class="form-control" id="clave" placeholder="clave" required>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
