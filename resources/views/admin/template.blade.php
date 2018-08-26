<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/app.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ route('admin.index') }}">CRASA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <div class="dropdown">
        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ session('admin.name') }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{ route('admin.logout') }}">Salir</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <div class="row">
      <nav class="col-2 sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            @include('admin.includes.menu')
          </ul>
        </div>
      </nav>
      <div class="col-10 content">
        @yield('content')
      </div>
    </div>

  </div>

  @section('scripts')
  <script src="{{ asset('dist/js/app.js') }}" ></script>
  @show

</body>
</html>
