@extends('admin.template')

@section('content')


<div id="app">
  <tipo-herramientas-create :routes="{{ $routes }}"></herramientas-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/proyectos.js') }}"></script>

@endsection