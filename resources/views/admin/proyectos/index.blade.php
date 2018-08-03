@extends('admin.template')

@section('content')

<div id="app">
	<proyectos-table
	:proyectos="{{ $proyectos }}"
	:routes="{{ $routes }}"
	:permisos="{{ permisos('proyectos') }}">
	</proyectos-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/proyectos/app.js') }}"></script>

@endsection
