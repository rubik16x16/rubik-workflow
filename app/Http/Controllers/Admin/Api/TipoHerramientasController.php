<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Herramienta;
use Illuminate\Support\Facades\DB;

class TipoHerramientasController extends Controller{

  public function index(Request $request){

    $tipoHerramienta= json_decode($request->query->get('tipoHerramienta'));
    $registrosPorPagina= $request->query->get('registrosPorPagina');
    $pagina= $request->query->get('pagina');
    $saltar= ($pagina - 1) * $registrosPorPagina;

    $attrsRaw= '';

    foreach(Herramienta::$attrsDistinct as $attr){
      $attrsRaw.= $attr . ', ';
    }

    $attrsRaw= substr($attrsRaw, 0 , strlen($attrsRaw) -2);

    $cantRegistros= DB::table('herramientas');
    $cantRegistros->select(DB::raw("count(DISTINCT {$attrsRaw}) as cantRegistros"));

    $herramientas= new Herramienta();
    $herramientas= $herramientas->newQuery();
    $herramientas->select(Herramienta::$attrsDistinct)->distinct();

    foreach(Herramienta::$attrsDistinct as $attr){
      if($tipoHerramienta->$attr != null){
        $cantRegistros->where($attr, $tipoHerramienta->$attr);
        $herramientas->where($attr, $tipoHerramienta->$attr);
      }
    }

    $cantRegistros= $cantRegistros->get()->first()->cantRegistros;
    $herramientas->take($registrosPorPagina)->skip($saltar);

    return response(json_encode([
      'cantRegistros' => $cantRegistros,
      'tipoHerramientas' => $herramientas->get()->toArray()
    ]))->header('Content-Type', 'application/json');

  }

}
