@extends('admin.template')

@section('content')


<div id="tipo-herramientas-app">
  <tipo-herramientas-create :routes="{{ $routes }}"></herramientas-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/proyectos/tipo-herramientas-app.js') }}"></script>

@endsection
