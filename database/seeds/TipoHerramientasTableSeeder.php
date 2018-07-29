<?php

use Illuminate\Database\Seeder;

use App\Models\TipoHerramienta;

class TipoHerramientasTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    $nombres= ['martillo', 'sierra', 'destornillador', 'cautin'];
    foreach($nombres as $nombre){
      TipoHerramienta::create(['nombre' => $nombre]);
    }
  }
}
