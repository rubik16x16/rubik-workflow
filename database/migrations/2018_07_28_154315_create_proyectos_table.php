<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('proyectos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nrocta_cliente');
      $table->string('idlocacion')->nullable();
      $table->string('idservicio')->nullable();
      $table->string('idoperacion')->nullable();
      $table->string('idlistaprecio')->nullable();
      $table->string('programa_cliente')->nullable();
      $table->string('idpozo')->nullable();
      $table->string('id_cia_pu_wo_ct_drilling')->nullable();
      $table->string('solicito')->nullable();
      $table->string('idpreparo')->nullable();
      $table->string('id_siam_casing')->nullable();
      $table->string('id_libraje')->nullable();
      $table->string('drift')->nullable();
      $table->string('diam_cano_ct')->nullable();
      $table->string('tipo_fluido')->nullable();
      $table->string('o_t_f')->nullable();
      $table->string('cia_trepano')->nullable();
      $table->string('desc_oper')->nullable();
      $table->string('diseno')->nullable();
      $table->string('recibidopor')->nullable();
      $table->string('aprobadopor')->nullable();
      $table->datetime('previstopara')->nullable();
      $table->string('preparadopor')->nullable();
      $table->string('hora')->nullable();
      $table->string('trailer')->nullable();
      $table->string('generador')->nullable();
      $table->string('proveedor')->nullable();
      $table->integer('estado')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
      Schema::dropIfExists('proyectos');
  }
}
