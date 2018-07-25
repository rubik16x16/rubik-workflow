<form action="{{ route('admin.login.post') }}" method="post">
  {{ csrf_field() }}
  <input type="email" name="email" placeholder="email">
  <input type="password" name="clave" placeholder="clave">
  <button type="submit">Ingresar</button>
</form>
