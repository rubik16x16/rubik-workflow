<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model{

	protected $table= 'acciones';
	protected $fillable= ['nombre', 'etiqueta', 'seccion_id'];

}
