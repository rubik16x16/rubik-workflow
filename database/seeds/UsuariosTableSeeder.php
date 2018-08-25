<?php

use Illuminate\Database\Seeder;

use App\Models\Usuario;

class UsuariosTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

		Usuario::create([
			'email' => 'admin@gmail.com',
			'name' => 'admin',
      'clave' => password_hash('admin', PASSWORD_DEFAULT)
		]);

		for($i= 1; $i < 10 ; $i++){
			Usuario::create([
				'name' => "operario{$i}",
				'email' => "usuario{$i}@gmail.com",
				'clave' => password_hash('123', PASSWORD_DEFAULT)
			]);
		}

		for($i= 10; $i < 13 ; $i++){
			Usuario::create([
				'name' => "operario{$i}",
				'email' => "usuario{$i}@gmail.com",
				'clave' => password_hash('123', PASSWORD_DEFAULT),
				'estado' => false
			]);
		}

  }
}
