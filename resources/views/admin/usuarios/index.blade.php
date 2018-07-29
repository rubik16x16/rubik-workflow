@extends('admin.template')

@section('content')

<div id="app">
  <usuarios-table :usuarios="{{ $usuarios }}" :routes="{{ $routes }}"></usuarios-table>
</div>

@endsection

@section('scripts')
<script src="{{ asset('dist/js/usuarios/app.js') }}" ></script>
@endsection
