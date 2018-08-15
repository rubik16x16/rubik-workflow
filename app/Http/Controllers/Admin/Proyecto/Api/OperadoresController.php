<?php

namespace App\Http\Controllers\Admin\Proyecto\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;

class OperadoresController extends Controller{

  public function get(Request $request){

    $rol= Rol::where('nombre', 'Operario')->get()->first();

    $operadores= new Usuario();
    $operadores= $operadores->newQuery();
    $operadores->where('estado', true);

    $operadores->leftJoin('proyecto_usuario', function($join){
      $join->on('usuarios.id', 'proyecto_usuario.usuario_id');
    })->whereNull('proyecto_usuario.usuario_id');

    $operadores->join('usuario_rol', function($join) use($rol){
      $join->on('usuarios.id', 'usuario_rol.usuario_id');
      $join->on('usuario_rol.rol_id', DB::raw($rol->id));
    });

    foreach ($request->all() as $key => $value) {
      if($value != null){
        $operadores->where($key, 'LIKE', "%{$value}%");
      }
    }

    $operadores->take(25);

    return response(json_encode([
      'operadores' => $operadores->get()->toArray()
    ]))->header('Content-Type', 'application/json');

  }

}
