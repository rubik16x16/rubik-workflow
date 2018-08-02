<?php

use Illuminate\Database\Seeder;

use App\Models\Accion;
use App\Models\Seccion;

class AccionesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

		$accionesBasicas= ['lista', 'agregar', 'ver', 'editar', 'eliminar'];

		foreach (Seccion::all() as $seccion) {
			foreach ($accionesBasicas as $accion) {
				Accion::create(['nombre' => $accion, 'etiqueta' => $accion, 'seccion_id' => $seccion->id]);
			}
		}

		Accion::create(['nombre' => 'asignarHerramientas', 'etiqueta' => 'Asignar Herramientas', 'seccion_id' => 5]);
		Accion::create(['nombre' => 'editarHerramientas', 'etiqueta' => 'Editar Herramientas', 'seccion_id' => 5]);

  }
}
