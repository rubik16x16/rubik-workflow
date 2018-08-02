<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{

	protected $table= 'proyectos';
	protected $fillable= ['nombre', 'estado'];

	public function operadores(){

		return $this->belongsToMany('App\Models\Usuario', 'proyecto_usuario');

	}

	public function tipoHerramientas(){

		return $this->belongsToMany('App\Models\TipoHerramienta', 'proyecto_tipo_herramienta');

	}

	public function herramientas(){

		return $this->belongsToMany('App\Models\Herramienta', 'proyecto_herramienta');

	}

}
