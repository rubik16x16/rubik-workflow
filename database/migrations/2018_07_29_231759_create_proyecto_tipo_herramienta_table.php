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
            $table->string('pn', 12);
            $table->string('tipo_herramienta');
            $table->string('od');
            $table->string('lg');
            $table->string('sub_tipo_herramienta');
            $table->string('descripcion');
            $table->string('top_connection');
            $table->string('bottom_connection');
            $table->unsignedInteger('proyecto_id');
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
