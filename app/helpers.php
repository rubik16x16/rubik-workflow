<?php

if (!function_exists('permiso')) {
	function permiso($seccionPermiso){

		$usuario= App\Models\Usuario::find(session('admin.id'));
		$permisos= $usuario->permisos();

		$permisos= $permisos->map(function($permiso){
      return $permiso->seccion->nombre . '-' . $permiso->accion->nombre;
    });

    if(!$permisos->contains($seccionPermiso)){
      return false;
    }

	  return true;
	}
}

if (!function_exists('permisos')) {
	function permisos($seccion){

		$usuario= App\Models\Usuario::find(session('admin.id'));
		$usuario->permisos()->each(function($permiso){
			$permiso->load('seccion', 'accion');
		});

		return str_replace('"', "'",$usuario->permisos()->toJson());

	}
}
