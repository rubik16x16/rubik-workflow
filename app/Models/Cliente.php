<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{

  protected $table = "VTMCLH";
  protected $primaryKey = "VTMCLH_NROCTA";
  public $incrementing= false;

  protected $connection = "sqlserver";

  public function locaciones(){
    return $this->hasMany('App\Models\Locacion', 'nrocta_cliente');
  }

  public function listasdeprecios(){
    return $this->hasMany('App\Models\ListaPrecio', 'USR_STTLPR_CLIE')->select("STTLPR_CODLIS","STTLPR_DESCRP","USR_STTLPR_CLIE");
  }

}
