<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoCasing extends Model
{
    protected $table = "proyecto_casing";

   public function casingdatos(){
    return $this->hasMany('App\Models\ProyectoCasingDatos', 'proyecto_casing_id');
  }
}
