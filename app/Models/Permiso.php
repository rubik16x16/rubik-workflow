<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model{

  protected $table= 'permisos';
  protected $fillable= ['tipo', 'rol_id', 'seccion_id'];

  public function seccion(){

    return $this->belongsTo('App\Models\Seccion');

  }

}
