<?php

use Illuminate\Database\Seeder;

use App\Models\Rol;

class RolesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

		Rol::create(['nombre' => 'Administrador']);
		Rol::create(['nombre' => 'Ingeniero']);
		Rol::create(['nombre' => 'Coordinador']);
		Rol::create(['nombre' => 'Operario']);

  }
}
