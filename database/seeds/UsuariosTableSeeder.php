<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    DB::table('usuarios')->insert([
      'email' => 'admin@gmail.com',
      'clave' => password_hash('admin', PASSWORD_DEFAULT),
    ]);

  }
}
