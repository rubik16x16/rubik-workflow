<?php

use Illuminate\Database\Seeder;

use App\Models\Seccion;
use App\Models\Permiso;

class PermisosTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    $secciones= Seccion::all()->load('acciones');

		foreach ($secciones as $seccion){
			foreach($seccion->acciones as $accion){
				Permiso::create(['accion_id' =>$accion->id, 'rol_id' => 1, 'seccion_id' => $seccion->id]);
			}
		}

  }
}
