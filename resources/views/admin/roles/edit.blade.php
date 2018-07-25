@extends('admin.template')

@section('content')

<form action="{{ route('admin.roles.update', ['id' => $rol->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ $rol->nombre }}">
  </div>

  <h2>Permisos</h2>

  <table class="table">
    <thead>
      <tr>
        <th>seccion</th>
        <th>lista</th>
        <th>editar</th>
        <th>agregar</th>
        <th>eliminar</th>
      </tr>
    </thead>
    @foreach($secciones as $seccion)
    <tr>
      <td>{{ $seccion->nombre }}</td>
      @foreach($permisos as $permiso)
      <td><input name="{{ $seccion->nombre . '-' . $permiso }}" class="form-check-input" type="checkbox" @if(in_array($permiso, $seccion->permisos)) checked @endif></td>
      @endforeach
    </tr>
    @endforeach
  </table>

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
