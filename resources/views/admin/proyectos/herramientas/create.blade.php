@extends('admin.template')

@section('content')

  <div id="herramientas-app">
    <create-herramientas :tipo-herramientas-prop="{{ $tipoHerramientas }}" :routes="{{ $routes }}"></create-herramientas>
  </div>

@endsection

@section('scripts')

  <script src="{{ asset('dist/js/proyectos/herramientas-app.js') }}"></script>

@endsection
