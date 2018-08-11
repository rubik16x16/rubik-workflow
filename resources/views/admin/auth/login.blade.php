<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Acceso WebApp</title>
  <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.css') }}">
  

</head>
  <body class="login-container">

  <!-- Main navbar -->
  <div class="navbar navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="{{ asset('dist/images/logo_light.png')}}" alt=""></a>

      <ul class="nav navbar-nav pull-right visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      </ul>
    </div>

    
  </div>
  <!-- /main navbar -->

 
  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

          <!-- Simple login form -->
    <form action action="{{ route('admin.login.post') }}" method="post">
      {{ csrf_field() }}
            <div class="panel panel-body login-form">
              <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Acceso al Sistema <small class="display-block">Ingrese sus credenciales</small></h5>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="text" class="form-control" placeholder="Usuario" name="email" id="email">
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="password" class="form-control" placeholder="Clave" name="clave" id="clave">
                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Ingresar <i class="icon-circle-right2 position-right"></i></button>
              </div>

             
               <div class="text-center">
                <img src="{{ asset('dist/images/logo_dark.png')}}" width="50%">
              </div>
            </div>
          </form>
          <!-- /simple login form -->


          <!-- Footer -->
          <div class="footer text-muted text-center">
            &copy; 2018/. <a href="#">CRASA Web App</a> 
          </div>
          <!-- /footer -->

        </div>
        <!-- /content area -->

      </div>
      <!-- /main content -->

    </div>
    <!-- /page content -->

  </div>
  <!-- /page container -->

</body>

</html>
