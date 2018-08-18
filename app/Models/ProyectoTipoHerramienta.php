<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Herramienta;

class ProyectoTipoHerramienta extends Model{

	protected $table= 'proyecto_tipo_herramienta';

	protected $fillable= ['proyecto_id','partnumber'];

	public function herramientas(){

		$fields= array_filter($this->getFillable(), function($field){
			return !in_array($field, ['proyecto_id']);
		});

		$herramientas= new Herramienta();
		$herramientas= $herramientas->newQuery();
		$herramientas->select('herramientas.id','herramientas.partnumber','herramientas.tool','herramientas.od','herramientas.largo','herramientas.type','herramientas.descrip','herramientas.top_conec','herramientas.bottom_conec','herramientas.nroserie');
		$herramientas->leftJoin('proyecto_herramienta', 'herramientas.id', '=', 'proyecto_herramienta.herramienta_id');
		$herramientas->whereNull('proyecto_herramienta.herramienta_id');


		foreach ($fields as $field) {
			$herramientas->where('herramientas.'.$field, $this->attributes[$field]);
			
			
		}

		return $herramientas->get();

	}

}
