<?php

use Illuminate\Database\Seeder;

use App\Models\Seccion;

class SeccionesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

		Seccion::create(['nombre' => 'usuarios']);
		Seccion::create(['nombre' => 'roles']);
		Seccion::create(['nombre' => 'tipoHerramientas']);
		Seccion::create(['nombre' => 'herramientas']);
		Seccion::create(['nombre' => 'proyectos']);

  }
}
