<?php

use Illuminate\Database\Seeder;

use App\Models\Herramienta;
use App\Models\TipoHerramienta;

class HerramientasTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

		$id= 1;
		foreach(TipoHerramienta::all() as $tipoHerramienta){

			for($i= 1; $i < 6; $i++){
				Herramienta::create([
					'id' => $id++,
					'color' => 'negro',
					'tipo_herramienta_id' => $tipoHerramienta->id
				]);
			}
			
		}

  }
}
