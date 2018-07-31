<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoUsuario extends Model{

	protected $table= 'proyecto_usuario';
	protected $fillable= ['proyecto_id', 'usuario_id'];

}
