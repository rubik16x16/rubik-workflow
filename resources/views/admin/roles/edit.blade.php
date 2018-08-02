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

	@foreach($secciones as $seccion)
  <table class="table">
    <thead>
      <tr>
        <th>seccion</th>
        @foreach($seccion->acciones as $accion)
				<th>{{ $accion->etiqueta }}</th>
				@endforeach
      </tr>
    </thead>

    <tr>
      <td>{{ $seccion->nombre }}</td>
      @foreach($seccion->acciones as $accion)
      <td><input name="{{ $seccion->id . '-' . $accion->id }}" class="form-check-input" type="checkbox" @if($accion->checked) checked @endif></td>
      @endforeach
    </tr>
  </table>
	@endforeach

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
