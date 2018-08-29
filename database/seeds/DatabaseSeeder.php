<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run(){ 
    $this->call(UsuariosTableSeeder::class);
    $this->call(RolesTableSeeder::class);
    $this->call(UsuarioRolTableSeeder::class);
    $this->call(SeccionesTableSeeder::class);
		$this->call(AccionesTableSeeder::class);
    $this->call(PermisosTableSeeder::class);
		$this->call(HerramientasTableSeeder::class);
    $this->call(HerramientaManoTableSeeder::class);
    $this->call(VehiculoRequisitoTableSeeder::class); 
     $this->call(ProyectoEstadoSeeder::class);
  }
}
