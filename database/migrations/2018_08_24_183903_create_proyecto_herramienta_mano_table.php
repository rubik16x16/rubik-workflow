<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoHerramientaManoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_herramienta_mano', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('herramienta_mano_id');
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
        Schema::dropIfExists('proyecto_herramienta_mano');
    }
}
