@extends('admin.template')

@section('content')

<div id="proyectos-app">
	<proyectos-table
	:proyectos="{{ $proyectos }}"
	:routes="{{ $routes }}"
	:permisos="{{ permisos('proyectos') }}">
	</proyectos-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/proyectos.js') }}"></script>

@endsection
