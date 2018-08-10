<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Herramienta;
use Illuminate\Support\Facades\DB;

class HerramientasController extends Controller{

  public function index(Request $request){

    if($request->query->get('tipoHerramienta') != NULL){
      $tipoHerramienta= json_decode($request->query->get('tipoHerramienta'));
    }

    // $tipoHerramienta= json_decode($request->query->get('tipoHerramienta'));
    $registrosPorPagina= $request->query->get('registrosPorPagina');
    $pagina= $request->query->get('pagina');
    $saltar= ($pagina - 1) * $registrosPorPagina;

    $herramientas= new Herramienta();
    $herramientas= $herramientas->newQuery();

    if(isset($tipoHerramienta)){
      foreach(Herramienta::$attrsDistinct as $attr){
        if($tipoHerramienta->$attr != NULL){
          $herramientas->where($attr, $tipoHerramienta->$attr);
        }
      }      
    }

    $cantRegistros= $herramientas->count();

    $herramientas->take($registrosPorPagina)->skip($saltar);

    return response(json_encode([
      'cantRegistros' => $cantRegistros,
      'herramientas' => $herramientas->get()->toArray()
    ]))->header('Content-Type', 'application/json');

  }

}
