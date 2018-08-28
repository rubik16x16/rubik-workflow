<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Maniobras as ManiobrasResource;
use App\Models\ManiobrasObservacion;
use App\Models\ManiobraTipo;

class ManiobrasController extends Controller
{
    public function listar($imei){

    	    	 
  $primero = ManiobraTipo::all()->load('observaciones');


  $tercero = new ManiobrasResource($primero);

  return $tercero;

  }
}
