<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pozo;

class PozoController extends Controller
{
 public function GetPozos($id){
   	
   		$pozos = Pozo::where('USR_FCTPZO_NROCTA',$id)->get();
   		$data = [];
   		$data[0] = [
   			'id' => 0,
   			'text' =>'Seleccione',
   		];
   		foreach ($pozos as $key => $value){
   			$data[$key+1] = [
   				'id'=> $value->USR_FCTPZO_CODIGO,
   				'text'=>$value->USR_FCTPZO_DESCRP,
   			];
   		}

   		return response()->json($data);
   }
}
