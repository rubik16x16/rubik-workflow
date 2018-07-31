<?php

use Illuminate\Database\Seeder;

use App\Models\UsuarioRol;

class UsuarioRolTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

		UsuarioRol::create([
			'usuario_id' => 1,
			'rol_id' => 1
		]);

		for($i= 2; $i < 14 ; $i++){
			UsuarioRol::create([
				'usuario_id' => $i,
				'rol_id' => 4
			]);
		}

  }
}
