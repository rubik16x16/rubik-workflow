<form action="{{ route('admin.usuarios.update', ['id' => $usuario->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <input type="email" name="email" placeholder="email" value="{{ $usuario->email }}" required>
  <input type="password" name="clave" placeholder="clave" required>
  <button type="submit" name="button">Enviar</button>
</form>
