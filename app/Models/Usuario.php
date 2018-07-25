<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
  protected $table= 'usuarios';
  protected $fillable= ['email', 'clave'];

  protected $hidden= ['clave'];

  public function roles(){

    return $this->belongsToMany('App\Models\Rol', 'usuario_rol', 'usuario_id', 'rol_id');

  }

  public function permisos(){
    $permisos= collect();
    foreach ($this->roles as $rol){
      $permisos= $permisos->concat($rol->permisos);
    }
    return $permisos;
  }
}
