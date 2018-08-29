<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoHerramienta extends Model{

	protected $table= 'proyecto_herramienta';
	protected $fillable= ['herramienta_id', 'proyecto_id', 'posicion'];


public function Herramientas(){
		return $this->hasMany('App\Models\Herramienta','id');
	}

}
