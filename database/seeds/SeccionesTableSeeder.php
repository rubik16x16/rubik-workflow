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

		Seccion::create(['nombre' => 'usuarios', 'etiqueta' => 'Usuarios']);
		Seccion::create(['nombre' => 'roles', 'etiqueta' => 'Roles']);
		Seccion::create(['nombre' => 'tipoHerramientas', 'etiqueta' => 'Tipos de Herramientas']);
		Seccion::create(['nombre' => 'herramientas', 'etiqueta' => 'Herramientas']);
		Seccion::create(['nombre' => 'proyectos', 'etiqueta' => 'Proyectos']);

  }
}
