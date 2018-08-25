<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoVehiculoRequisito extends Model{

	protected $table= 'proyecto_vehiculo_requisito';
	protected $fillable= ['vehiculo_requisito_id', 'proyecto_id','estado'];

}
