@extends('admin.template')

@section('content')

<div id="app">
  <herramientas-table :herramientas="{{ $herramientas }}" :routes="{{ $routes }}"></herramientas-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/herramientas/app.js') }}"></script>

@endsection