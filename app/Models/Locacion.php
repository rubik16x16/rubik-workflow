<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacion extends Model{

  protected $table = "cliente_locacion";
  protected $connection = "sqlserver";

  public function pozos(){
    return $this->hasMany('App\Models\Pozo', 'locacion_id')->select("USR_FCTPZO_CODIGO","USR_FCTPZO_DESCRP","locacion_id");
  }

}
