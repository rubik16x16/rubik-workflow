@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

<h3>Operadores</h3>

<ul>
	@foreach($proyecto->operadores as $operador)
	<li>{{ $operador->email }}</li>
	@endforeach
</ul>

<h3>Tipos de herramientas a usar</h3>

<ul>
	@foreach($proyecto->tipoHerramientas as $tipoHerramienta)
	<li>{{ $tipoHerramienta->nombre }}</li>
	@endforeach
</ul>

<h3>herramientas asignadas</h3>

<ul>
	@foreach($proyecto->herramientas as $herramienta)
	<li>{{ $herramienta->tipo->nombre . ':' . $herramienta->id }}</li>
	@endforeach
</ul>

@endsection
