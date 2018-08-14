@extends('admin.template')

@section('content')

<div id="operadores-app">
  <operadores-table :operadores="{{ $operadores }}" :routes="{{ $routes }}"></operadores-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/operadores-app.js') }}"></script>

@endsection()
