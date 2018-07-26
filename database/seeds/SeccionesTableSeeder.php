<?php

use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    DB::table('secciones')->insert([
      'nombre' => 'usuarios'
    ]);

  }
}
