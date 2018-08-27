<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccionesTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('acciones', function (Blueprint $table) {
      $table->increments('id');
			$table->string('nombre');
			$table->string('etiqueta');
			$table->unsignedInteger('seccion_id');
			$table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('acciones');
  }
}
