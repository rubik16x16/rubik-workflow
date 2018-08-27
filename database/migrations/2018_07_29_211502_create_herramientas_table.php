<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientasTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('herramientas', function (Blueprint $table) {
      $table->increments('id');
      $table->string('partnumber');
      $table->string('nroserie');
      $table->string('tool');
      $table->string('od');
      $table->string('ind');
      $table->string('largo');
      $table->string('type');
      $table->string('descrip');
      $table->string('top_conec');
      $table->string('bottom_conec');
      $table->string('drop_bal1');
      $table->string('drop_bal2');
      $table->string('od_bolita_dh');
      $table->string('od_pines_corte');
      $table->string('od_presion');
      $table->string('sub_circul');
      $table->string('sub_pines_corte');
      $table->string('sub_presion');
      $table->string('disco_ruptura');
      $table->string('disco_presion');
      $table->string('valor_corte');
      $table->string('mdf_tipo');
      $table->string('mdf_ps');
      $table->string('mdf_torque');
      $table->string('mdf_power');
      $table->string('mdf_caudal_min');
      $table->string('mdf_caudal_max');
      $table->string('mdf_rpm_min');
      $table->string('mdf_rpm_max');
      $table->string('mdf_dif_presion');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('herramientas');
  }
}
