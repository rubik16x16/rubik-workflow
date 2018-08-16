@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<form action="{{ route('admin.proyectos.herramientas.update', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}
	@method('PUT')

  <h4 class="text-center">Herramientas</h2>

    <table class="table text-center">
      <thead class="thead-dark">
        <th>tipo de herramienta</th>
        <th>od</th>
        <th>lg</th>
        <th>subtipo de herramienta</th>
        <th>descripcion</th>
        <th>top connection</th>
        <th>bottom connection</th>
        <th>pn</th>
        <th>Agregar</th>
      </thead>
      <tbody>
        @foreach($herramientas as $herramienta)
        <tr>
          <td>{{ $herramienta->tipo_herramienta }}</td>
          <td>{{ $herramienta->od }}</td>
          <td>{{ $herramienta->lg }}</td>
          <td>{{ $herramienta->sub_tipo_herramienta }}</td>
          <td>{{ $herramienta->descripcion }}</td>
          <td>{{ $herramienta->top_connection }}</td>
          <td>{{ $herramienta->bottom_connection }}</td>
          <td>{{ $herramienta->pn }}</td>
          <td><input type="checkbox" name="herramienta-{{ $herramienta->pn }}" value="{{ $herramienta->pn }}" @if($herramienta->checked) checked @endif></td>
        </tr>
        @endforeach
      </tbody>
    </table>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
