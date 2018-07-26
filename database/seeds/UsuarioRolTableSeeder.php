<?php

use Illuminate\Database\Seeder;

class UsuarioRolTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    DB::table('usuario_rol')->insert([
      'usuario_id' => 1,
      'rol_id' => 1
    ]);

  }
}
