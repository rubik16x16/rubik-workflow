<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('permisos', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('seccion_id');
			$table->unsignedInteger('rol_id');
			$table->unsignedInteger('accion_id');
			$table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('accion_id')->references('id')->on('acciones')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('permisos');
  }
}
