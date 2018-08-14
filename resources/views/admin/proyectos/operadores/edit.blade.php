@extends('admin.template')

@section('content')

<div id="operadores-app">
  <edit-operadores :operadores="{{ $operadores }}" :routes="{{ $routes }}"></edit-operadores>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/operadores-app.js') }}"></script>

@endsection()
