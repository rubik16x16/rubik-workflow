<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManiobraTipo extends Model
{
     protected $table = "maniobra";
    
     public function observaciones(){
    return $this->hasMany('App\Models\ManiobraObservacion', 'maniobra_id');
  }
}
