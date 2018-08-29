@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<form action="{{ route('admin.proyecto.herramientas.store', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}

	<h4 class="text-center">Asignar herramientas</h2>

    @foreach($tipoHerramientas as $tipoHerramienta)
      <div class="row text-center">
        <div class="col-6">
          <table class="table table-striped table-borderless">
            <thead class="thead-dark">
              <th colspan="2">tipo de herramienta posicion {{ $tipoHerramienta->posicion }}</th>
            </thead>
            <tbody>
              <tr>
                <th scope="row">tool</th>
                <td>{{ $tipoHerramienta->herramienta->tool }}</td>
              </tr>
              <tr>
                <th scope="row">od</th>
                <td>{{ $tipoHerramienta->herramienta->od }}</td>
              </tr>
              <tr>
                <th scope="row">largo</th>
                <td>{{ $tipoHerramienta->herramienta->largo }}</td>
              </tr>
              <tr>
                <th scope="row">type</th>
                <td>{{ $tipoHerramienta->herramienta->type }}</td>
              </tr>
              <tr>
                <th scope="row">descripcion</th>
                <td>{{ $tipoHerramienta->herramienta->descrip }}</td>
              </tr>
              <tr>
                <th scope="row">top connection</th>
                <td>{{ $tipoHerramienta->herramienta->top_conec }}</td>
              </tr>
              <tr>
                <th scope="row">bottom connection</th>
                <td>{{ $tipoHerramienta->herramienta->bottom_conec }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <h4>Herramientas disponibles</h4>
          <table class="table table-striped table-borderless">
            <thead class="thead-dark">
              <th>#</th>
              <th>pn</th>
              <th>sn</th>
              <th>usar</th>
            </thead>
            <tbody>
              @foreach($tipoHerramienta->herramientas as $herramienta)
              <tr>
                <td>{{ $herramienta->id }}</td>
                <td>{{ $herramienta->pn }}</td>
                <td>{{ $herramienta->sn }}</td>
                <td><input type="radio" name="herramienta-{{ $tipoHerramienta->id }}" value="{{ $herramienta->id }}-{{ $tipoHerramienta->posicion }}"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endforeach

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
