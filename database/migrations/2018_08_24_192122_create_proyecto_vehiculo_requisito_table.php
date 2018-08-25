<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoVehiculoRequisitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_vehiculo_requisito', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehiculo_requisito_id');
            $table->unsignedInteger('proyecto_id');
            $table->char('estado',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecyo_vehiculo_requisito');
    }
}
