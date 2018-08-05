<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
</head>
<body class="login-body">

  <div class="login-form">
    <h2 class="text-center">Por favor inicie session</h2>
    <form action action="{{ route('admin.login.post') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="email" id="correo" placeholder="Ingrese su email">
      </div>
      <div class="form-group">
        <label for="clave">Clave</label>
        <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su clave">
      </div>
      <button type="submit" class="btn btn-login btn-block">Ingresar</button>
    </form>
  </div>

</body>
</html>
