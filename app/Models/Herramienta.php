<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model{

  static $attrsDistinct= [
    'tipo_herramienta', 'od', 'lg',
    'sub_tipo_herramienta', 'descripcion',
    'top_connection', 'bottom_connection'
  ];

  protected $table= 'herramientas';

  protected $fillable= [
    'tipo_herramienta', 'od', 'lg',
    'sub_tipo_herramienta', 'descripcion',
    'top_connection', 'bottom_connection'
  ];

}
