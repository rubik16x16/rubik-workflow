<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoTipoHerramienta extends Model{

	protected $table= 'proyecto_tipo_herramienta';
	protected $fillable= ['tipo_herramienta_id', 'proyecto_id'];

}
