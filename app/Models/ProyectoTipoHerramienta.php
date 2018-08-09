<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoTipoHerramienta extends Model{

	protected $table= 'proyecto_tipo_herramienta';
	
	protected $fillable= [
		'proyecto_id', 'tipo_herramienta','od',
		'lg','sub_tipo_herramienta','top_connection',
		'bottom_connection'
	];

}
