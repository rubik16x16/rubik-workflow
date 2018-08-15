<?php

namespace App\Http\Controllers\Admin\Proyecto\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Herramienta;
use Illuminate\Support\Facades\DB;

class TipoHerramientasController extends Controller{

  public function get(Request $request){

    if($request->query->get('tipoHerramienta') != NULL){
      $tipoHerramienta= json_decode($request->query->get('tipoHerramienta'));
    }

    $attrsRaw= '';

    foreach(Herramienta::$attrsDistinct as $attr){
      $attrsRaw.= $attr . ', ';
    }

    $attrsRaw= substr($attrsRaw, 0 , strlen($attrsRaw) -2);

    $herramientas= new Herramienta();
    $herramientas= $herramientas->newQuery();

    foreach(Herramienta::$attrsDistinct as $attr){
      $herramientas->groupBy($attr);
    }

    if(isset($tipoHerramienta)){
      foreach(Herramienta::$attrsDistinct as $attr){
        if($tipoHerramienta->$attr != null){
          switch($attr){
            case 'lg':
              $herramientas->where($attr,'like' ,"{$tipoHerramienta->$attr}%");
            break;
            case 'od':
              $herramientas->where($attr,'like' ,"{$tipoHerramienta->$attr}%");
            break;
            default:
              $herramientas->where($attr,'like' ,"%{$tipoHerramienta->$attr}%");
          }
        }
      }
    }

    $herramientas->take(25);

    return response(json_encode([
      'tipoHerramientas' => $herramientas->get()->toArray()
    ]))->header('Content-Type', 'application/json');

  }

}
