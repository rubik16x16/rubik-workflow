<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model{

  protected $table= 'herramientas';
  protected $fillable= ['id', 'color', 'tipo_herramienta_id'];

  public function tipo(){

    return $this->belongsTo('App\Models\TipoHerramienta', 'tipo_herramienta_id');

  }

}
