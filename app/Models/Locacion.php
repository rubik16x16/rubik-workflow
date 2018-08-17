<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacion extends Model{

  protected $table = "cliente_locacion";

  public function pozos(){
    return $this->hasMany('App\Models\Pozo', 'locacion_id');
  }

}
