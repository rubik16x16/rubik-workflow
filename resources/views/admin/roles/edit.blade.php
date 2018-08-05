@extends('admin.template')

@section('content')

<form action="{{ route('admin.roles.update', ['id' => $rol->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="{{ $rol->nombre }}">
  </div>

  <h2 class="text-center">Permisos</h2>

  <div class="row">
  	@foreach($secciones as $seccion)
    <div class="col-6">
      <div class="card text-center">
        <div class="card-header">
          {{ $seccion->etiqueta }}
        </div>
        <div class="card-body">
          <table class="table table-striped table-borderless">
            <thead class="thead-dark">
              <tr>
                <th>Accion</th>
        				<th>Permiso</th>
              </tr>
            </thead>
            <tbody>
              @foreach($seccion->acciones as $accion)
              <tr>
                <td>{{ $accion->etiqueta }}</td>
                <td><input name="{{ $seccion->id . '-' . $accion->id }}" class="form-check-input" type="checkbox" @if($accion->checked) checked @endif></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  	@endforeach
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
