<?php

use Illuminate\Database\Seeder;
use App\Models\VehiculoRequisito;

class VehiculoRequisitoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          VehiculoRequisito::create(['nombre' => 'Registro','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Seguro','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Cedula Verde','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Recibo Patente','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'VTV/RTO','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Permiso de ingreso Yac.','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Balizas triangulo','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Botiquin','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Extintor','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Chaleco refractario','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Crique','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Neumaticos','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Ajuste de tuercas','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Alarmas de retroceso','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Parabrisas','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Limpia Lava Parabrisas','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Luces','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Baja','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Alta','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Posicion','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Balizas','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Stop','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Tacografo','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Rueda de Auxilio','activo'=>'1' ]);
          VehiculoRequisito::create(['nombre' => 'Arrestallama','activo'=>'1' ]);

    }
}
