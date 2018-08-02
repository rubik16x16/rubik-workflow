<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model{

  protected $table= 'permisos';
  protected $fillable= ['accion_id', 'rol_id', 'seccion_id'];

  public function seccion(){

    return $this->belongsTo('App\Models\Seccion');

  }

	public function accion(){

		return $this->belongsTo('App\Models\Accion');

	}

}
