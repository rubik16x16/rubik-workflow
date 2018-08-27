<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Herramienta;

class ProyectoTipoHerramienta extends Model{

	protected $table= 'proyecto_tipo_herramienta';

	protected $fillable= ['proyecto_id', 'herramienta_id', 'posicion'];

	public function herramientas(){

		$tipoHerramienta= $this->herramienta;
		$fields= $tipoHerramienta->getFillable();

		$herramientas= new Herramienta();

		$herramientas= $herramientas->newQuery();
		$herramientas->select('herramientas.id','herramientas.partnumber','herramientas.tool','herramientas.od','herramientas.largo','herramientas.type','herramientas.descrip','herramientas.top_conec','herramientas.bottom_conec','herramientas.nroserie');
		$herramientas->leftJoin('proyecto_herramienta', 'herramientas.id', '=', 'proyecto_herramienta.herramienta_id');
		$herramientas->whereNull('proyecto_herramienta.herramienta_id');

		foreach ($fields as $field) {
			$herramientas->where('herramientas.'.$field, $tipoHerramienta->$field);
		}

		return $herramientas->get();

	}

	public function herramienta(){

		return $this->belongsTo('App\Models\Herramienta');

	}

}
