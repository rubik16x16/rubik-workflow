@extends('admin.template')

@section('content')

<div id="operadores-app">
  <create-operadores :operadores="{{ $operadores }}" :routes="{{ $routes }}"></create-operadores>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/operadores-app.js') }}"></script>

@endsection()
