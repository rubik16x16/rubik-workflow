<?php

use Illuminate\Database\Seeder;

use App\Models\Herramienta;

class HerramientasTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    $tipoHerramientas=['Motor', 'Underreamer', 'Bit thruster', 'Wash Pipe', 'Connector'];
    $ods= ['1000', '1.700', '2.125', '2.875'];
    $largos= ['6.82', '9.44', '11.26', '12.27'];
    $subTipoHerramientas= ['Short', 'Titan', 'Titan Hight Flow', 'Titan SuperMax'];
    $descripciones= ['w/ All Metal Power Section', 'w/ Conventional Power Section', 'w/ Power Plus Power Section', 'w/ Spiro Star Power Section'];
    $topConnections= ['1" AM MT Box Up (350 Ft/Lbs)', '2-3/8" PAC Box Up (2,300 Ft/Lbs)', '1" AM MT Pin Up (350 Ft/Lbs)'];
    $bottomConnections= ['7/8" AM MT Pin Dn (225 Ft/Lbs)', '1" AM MT Pin Dn (350 Ft/Lbs)'];

    $i= 1;

		foreach($tipoHerramientas as $tipoHerramienta){
      foreach($ods as $od){
        foreach($largos as $largo){
          foreach($subTipoHerramientas as $subTipoHerramienta){
            foreach($descripciones as $descripcion){
              foreach($topConnections as $topConnection){
                foreach ($bottomConnections as $bottomConnection) {

                  Herramienta::create([
                    'partnumber' => "MTR-{$i}",
                    'tool' => $tipoHerramienta,
                    'od' => $od,
                    'largo' => $largo,
                    'type' => $subTipoHerramienta,
                    'descrip' => $descripcion,
                    'top_conec' => $topConnection,
                    'bottom_conec' => $bottomConnection
                  ]);

                  $i++;

                }
              }
            }
          }
        }
      }
		}

  }

}
