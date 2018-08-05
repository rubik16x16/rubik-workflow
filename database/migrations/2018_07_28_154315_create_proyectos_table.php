<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
			      $table->boolean('estado')->default(true);
            $table->char('nrocta_cliente',13);
            $table->string('locacion');
            $table->string('fecha');
            $table->string('servicio');
            $table->string('programa_cliente');
            $table->string('n_pozo');
            $table->string('cia_pu_wo_ct_drilling');
            $table->string('solicito');
            $table->string('preparo');
            $table->string('siam_casing');
            $table->string('libraje');
            $table->string('drift');
            $table->string('diam_cano_ct');
            $table->string('tipo_fluido');
            $table->string('o_t_f');
            $table->string('cia_trepano');
            $table->string('desc_oper');
            $table->string('od_bolita');
            $table->string('od_pines');
            $table->string('od_presion');
            $table->string('sub_de_circulacion');
            $table->string('sub_circ_pines');
            $table->string('sub_circ_presion');
            $table->string('disco_ruptura');
            $table->string('disco_presion');
            $table->string('valor_corte');
            $table->string('mdf_tipo');
            $table->string('mdf_ps');
            $table->string('mdf_torque');
            $table->string('mdf_overpull');
            $table->string('mdf_backreaming');
            $table->string('mdf_power');
            $table->string('mdf_caudal_max');
            $table->string('mdf_caudal_min');
            $table->string('mdf_rpm_max');
            $table->string('mdf_rpm_min');
            $table->string('mdf_wob_max');
            $table->string('mdf_wob_min');
            $table->string('mdf_pres_max');
            $table->string('mdf_pres_min');
            $table->string('diseno');
            $table->string('recibidopor');
            $table->string('aprobadopor');
            $table->string('previstopara');
            $table->string('preparadopor');
            $table->string('hora');
            $table->string('trailer');
            $table->string('generador');
            $table->string('proveedor');
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
        Schema::dropIfExists('proyectos');
    }
}
