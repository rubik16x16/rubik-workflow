@extends('admin.template')

@section('content')


<div id="proyectos-app">
  <tipo-herramientas-edit :routes="{{ $routes }}" :asignados="{{ $asignados }}"></herramientas-table>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/proyectos.js') }}"></script>

@endsection
