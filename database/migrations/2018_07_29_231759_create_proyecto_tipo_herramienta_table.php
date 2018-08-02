<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoTipoHerramientaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_tipo_herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_herramienta_id');
            $table->unsignedInteger('proyecto_id');
            $table->foreign('tipo_herramienta_id')->references('id')->on('tipo_herramientas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('proyecto_tipo_herramienta');
    }
}
