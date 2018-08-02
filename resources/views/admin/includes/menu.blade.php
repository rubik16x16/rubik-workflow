@if(permiso('usuarios-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.usuarios.index') }}">Usuaios</a>
</li>
@endif
@if(permiso('roles-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.roles.index') }}">Roles</a>
</li>
@endif
@if(permiso('tipoHerramientas-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.tipoHerramientas.index') }}">Tipos de Herramientas</a>
</li>
@endif
@if(permiso('herramientas-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.herramientas.index') }}">Herramientas</a>
</li>
@endif
@if(permiso('proyectos-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.proyectos.index') }}">Proyectos</a>
</li>
@endif
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
</li>
