<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrecioItem extends Model
{
    protected $table = "STTPRE";
    protected $connection = "sqlserver";
    protected $primaryKey = "STTPRE_ARTCOD";
     public $incrementing= false;
   
    public function descripcion(){
    	
    return $this->hasOne('App\Models\Item','STMPDH_ARTCOD')->select("STMPDH_DESCRP as descripcion","STMPDH_ARTCOD");
  }

}
