<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model{

    static $attrsDistinct= [
    'tool', 'od', 'largo',
    'type', 'descrip',
    'top_conec', 'bottom_conec'
  ];

  protected $table= 'herramientas';

  protected $fillable= [
    'tool', 'od', 'largo',
    'type', 'descrip',
    'top_conec', 'bottom_conec'
  ];

}
