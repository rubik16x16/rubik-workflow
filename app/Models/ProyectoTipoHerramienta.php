<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Herramienta;

class ProyectoTipoHerramienta extends Model{

	protected $table= 'proyecto_tipo_herramienta';

	protected $fillable= [
		'proyecto_id','pn', 'tipo_herramienta','od',
		'lg', 'sub_tipo_herramienta', 'descripcion',
		'top_connection', 'bottom_connection'
	];

	public function herramientas(){

		$fields= array_filter($this->getFillable(), function($field){
			return !in_array($field, ['pn', 'proyecto_id']);
		});

		$herramientas= new Herramienta();
		$herramientas= $herramientas->newQuery();

		foreach ($fields as $field) {
			$herramientas->where($field, $this->attributes[$field]);
		}

		return $herramientas->get();

	}

}
