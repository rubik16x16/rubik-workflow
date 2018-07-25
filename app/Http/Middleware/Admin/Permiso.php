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
  public function handle($request, Closure $next, $permiso){

    $admin= Usuario::find($request->session()->get('admin.id'));
    $permisos= $admin->permisos();
    $permisos= $permisos->map(function($item){
      return $item->seccion . '-' . $item->tipo;
    })->toArray();

    if(!in_array($permiso, $permisos)){

      dd('no tiene permiso');

    }

    return $next($request);

  }
}
