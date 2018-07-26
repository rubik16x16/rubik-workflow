<?php

use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    $tipos= ['lista', 'editar', 'agregar', 'eliminar'];
    foreach($tipos as $tipo){

      DB::table('permisos')->insert([
        'tipo' => $tipo,
        'seccion_id' => 1,
        'rol_id' => 1
      ]);

    }

  }
}
