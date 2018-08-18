@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<form action="{{ route('admin.proyecto.herramientas.store', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}

	<h4 class="text-center">Herramientas</h2>

    <table class="table text-center">
      <thead class="thead-dark">
        <th>Tool</th>
        <th>OD</th>
        <th>LG</th>
        <th>Type</th>
        <th>Descripción</th>
        <th>top connec</th>
        <th>bottom connec</th>
        <th>PN</th>
        <th>SN</th>
        <th>Agregar</th>
      </thead>
      <tbody>
        @foreach($herramientas as $herramienta)
         <tr>
          <td>{{ $herramienta->tool }}</td>
          <td>{{ $herramienta->od }}</td>
          <td>{{ $herramienta->largo }}</td>
          <td>{{ $herramienta->type }}</td>
          <td>{{ $herramienta->descrip }}</td>
          <td>{{ $herramienta->top_conec }}</td>
          <td>{{ $herramienta->bottom_conec }}</td>
          <td>{{ $herramienta->partnumber }}</td>
          <td>{{ $herramienta->nroserie }}</td>
          <td><input type="checkbox" name="herramienta-{{ $herramienta->id }}" value="{{ $herramienta->id }}"></td>
        </tr>
        @endforeach
      </tbody>
    </table>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
