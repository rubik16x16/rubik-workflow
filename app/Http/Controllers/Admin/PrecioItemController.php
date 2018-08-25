<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Prices as PriceResource;
use App\Models\ListaPrecio;
use App\Models\PrecioItem;
use App\Models\Item;
use App\Models\Proyecto;

class PrecioItemController extends Controller
{
    public function listar($imei){

    	$id = Proyecto::where("tablet_imei",$imei)->first();

    	if ($id==null){
    		$idlistaprecios = "";
    	}
    	else
    		$idlistaprecios = $id->idlistaprecios;

 
  $primero = PrecioItem::select("STTPRE_ARTCOD","STTPRE_PRECIO as precio")->where('STTPRE_CODLIS','=',$idlistaprecios)->get();
  $segundo = $primero->load('descripcion');

function flatten($array) {
    $result = [];
    $indice = 0;
    foreach ($array as $item) {
    	$result[$indice]['codigo'] = $item->STTPRE_ARTCOD;
    	$result[$indice]['descripcion'] = $item->descripcion->descripcion;
    	$result[$indice]['precio'] = $item->precio;
    	$indice++;
    	
    }
return collect($result);
}


$flattenArray = flatten($segundo);


  $tercero = new PriceResource($flattenArray);

  return $tercero;

 	  //return new PriceResource(PrecioItem::select("STTPRE_ARTCOD","STTPRE_PRECIO as precio")->where('STTPRE_CODLIS','=',$id->idlistaprecios)->get()->load('descripcion'));
  }
}
