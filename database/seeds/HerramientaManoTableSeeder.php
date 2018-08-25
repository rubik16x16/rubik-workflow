<?php

use Illuminate\Database\Seeder;

use App\Models\HerramientaMano;


class HerramientaManoTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

        HerramientaMano::create(['nombre' => 'Notebook','activo'=>'1' ]);
				HerramientaMano::create(['nombre' => 'Impresora','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Detector de Gases','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Celda de Carga','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Calibre Digital','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Torqueadora','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Stilson 36(Insp.)','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Crique','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Maza de Goma','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Plato(Insp.)','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Manguera conex.','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Filtro Linea','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Dimplera','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Llave Alen','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Cepillo','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Red Caja','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Arnés TA','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Grasa','activo'=>'1' ]);
        HerramientaMano::create(['nombre' => 'Trapos','activo'=>'1' ]);
        
			}
		

  }

