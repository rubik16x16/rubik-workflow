<?php

namespace App\Http\Middleware\Admin;

use Closure;

use App\Models\Usuario;

class Permiso{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $seccionPermiso){

    $admin= Usuario::find($request->session()->get('admin.id'));
    $permisos= $admin->permisos();
    $permisos= $permisos->map(function($permiso){
      return $permiso->seccion->nombre . '-' . $permiso->accion->nombre;
    });

    if(!$permisos->contains($seccionPermiso)){

      abort(403, 'no tiene permiso');

    }

    return $next($request);

  }
}
