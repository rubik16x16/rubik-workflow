<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteController extends Controller
{
   public function GetClientes(){

   		$clientes = Cliente::all();
   		$data = [];
   		$data[0] = [
   			'id' => 0,
   			'text' =>'Seleccione',
   		];
   		foreach ($clientes as $key => $value){
   			$data[$key+1] = [
   				'id'=> $value->VTMCLH_NROCTA,
   				'text'=>$value->VTMCLH_NOMBRE,
   			];
   		}

   		return response()->json($data);
   }
}
