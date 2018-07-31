<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHerramienta extends Model{

  protected $table= 'tipo_herramientas';
  protected $fillable= ['nombre'];

	public function herramientas(){

		return $this->hasMany('App\Models\Herramienta', 'tipo_herramienta_id');

	}

}
