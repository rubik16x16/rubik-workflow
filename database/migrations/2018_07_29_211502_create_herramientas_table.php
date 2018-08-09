<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->string('pn', 8)->primary();
            $table->string('tipo_herramienta');
            $table->string('od');
            $table->string('lg');
            $table->string('sub_tipo_herramienta');
            $table->string('descripcion');
            $table->string('top_connection');
            $table->string('bottom_connection');
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
        Schema::dropIfExists('herramientas');
    }
}
