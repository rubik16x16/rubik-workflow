@if(permiso('usuarios-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.usuarios.index') }}"><i class="fas fa-users"></i> Usuarios</a>
</li>
@endif
@if(permiso('roles-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.roles.index') }}"><i class="fas fa-users-cog"></i> Roles</a>
</li>
@endif
@if(permiso('herramientas-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.herramientas.index') }}"><i class="fas fa-toolbox"></i> Herramientas</a>
</li>
@endif
@if(permiso('proyectos-lista'))
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.proyectos.index') }}"><i class="fas fa-project-diagram"></i> Proyectos</a>
</li>
@endif
