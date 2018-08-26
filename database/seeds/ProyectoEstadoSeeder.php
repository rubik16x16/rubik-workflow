<?php

use Illuminate\Database\Seeder;
use App\Models\ProyectoEstado;

class ProyectoEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProyectoEstado::create(['nombre'=>'Ingeniero','posicion'=>'1']);
        ProyectoEstado::create(['nombre'=>'Jefe de Taller','posicion'=>'2']);
        ProyectoEstado::create(['nombre'=>'Operario','posicion'=>'3']);
        ProyectoEstado::create(['nombre'=>'En Pozo','posicion'=>'4']);
        ProyectoEstado::create(['nombre'=>'Vuelta Deposito','posicion'=>'5']);
        ProyectoEstado::create(['nombre'=>'Archivado','posicion'=>'6']);
        ProyectoEstado::create(['nombre'=>'Cancelado','posicion'=>'7']);
    }
}
