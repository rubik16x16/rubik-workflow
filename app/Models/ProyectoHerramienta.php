<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoHerramienta extends Model{

	protected $table= 'proyecto_herramienta';
	protected $fillable= ['herramienta_pn', 'proyecto_id'];

}
