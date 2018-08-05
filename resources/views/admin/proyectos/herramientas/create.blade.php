@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<form action="{{ route('admin.proyectos.herramientas.store', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}

	<h4 class="text-center">Herramientas</h2>

  <div class="row">

	@foreach($coleccionesHerramientas as $coleccionHerramientas)
		@foreach($coleccionHerramientas as $tipoHerramienta => $herramientas)

    <div class="col-6">
      <div class="card">
        <h5 class="card-header">{{ $tipoHerramienta }}</h5>
        <div class="card-body table-responsive">
          <table class="table table-striped table-borderless text-center">
            <thead class="thead-dark">
              <th>Herramienta id</th>
              <th>Herramienta color</th>
              <th>Asignar</th>
            </thead>
            <tbody>
              @foreach($herramientas as $herramienta)
              <tr>
                <td>{{ $herramienta->id }}</td>
                <td>{{ $herramienta->color }}</td>
                <td><input type="checkbox" name="herramienta-{{ $herramienta->id }}" value="{{ $herramienta->id }}"></td>
              </tr>
        			@endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

		@endforeach
	@endforeach

  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
