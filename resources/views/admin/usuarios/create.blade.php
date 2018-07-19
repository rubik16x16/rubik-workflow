<form action="{{ route('admin.usuarios.store') }}" method="post">
  {{ csrf_field() }}
  <input type="email" name="email" placeholder="email">
  <input type="password" name="clave" placeholder="clave">
  <button type="submit" name="button">Enviar</button>
</form>
