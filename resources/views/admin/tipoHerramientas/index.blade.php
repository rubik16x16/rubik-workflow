@extends('admin.template')

@section('content')

<div id="app">
  <tipo-herramientas-table :tipoherramientas="{{ $tipoHerramientas }}" :routes="{{ $routes }}"></herramientas-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/tipoHerramientas/app.js') }}"></script>

@endsection
