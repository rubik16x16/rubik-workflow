<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoHerramientaMano extends Model{

	protected $table= 'proyecto_herramienta_mano';
	protected $fillable= ['herramienta_mano_id', 'proyecto_id','estado'];

}
