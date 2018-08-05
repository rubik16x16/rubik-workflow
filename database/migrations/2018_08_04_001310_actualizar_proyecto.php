<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('proyectos', function (Blueprint $table) {
        
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
        $table->string('fechaymedio');
        $table->string('observa_herramientas');
        $table->string('nrotrabajo');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('proyectos', function($table) {
        
        $table->dropColumn('nrocta_cliente');
        $table->dropColumn('locacion');
        $table->dropColumn('fecha');
        $table->dropColumn('servicio');
        $table->dropColumn('programa_cliente');
        $table->dropColumn('n_pozo');
        $table->dropColumn('cia_pu_wo_ct_drilling');
        $table->dropColumn('solicito');
        $table->dropColumn('preparo');
        $table->dropColumn('siam_casing');
        $table->dropColumn('libraje');
        $table->dropColumn('drift');
        $table->dropColumn('diam_cano_ct');
        $table->dropColumn('tipo_fluido');
        $table->dropColumn('o_t_f');
        $table->dropColumn('cia_trepano');
        $table->dropColumn('desc_oper');
        $table->dropColumn('od_bolita');
        $table->dropColumn('od_pines');
        $table->dropColumn('od_presion');
        $table->dropColumn('sub_de_circulacion');
        $table->dropColumn('sub_circ_pines');
        $table->dropColumn('sub_circ_presion');
        $table->dropColumn('disco_ruptura');
        $table->dropColumn('disco_presion');
        $table->dropColumn('valor_corte');
        $table->dropColumn('mdf_tipo');
        $table->dropColumn('mdf_ps');
        $table->dropColumn('mdf_torque');
        $table->dropColumn('mdf_overpull');
        $table->dropColumn('mdf_backreaming');
        $table->dropColumn('mdf_power');
        $table->dropColumn('mdf_caudal_max');
        $table->dropColumn('mdf_caudal_min');
        $table->dropColumn('mdf_rpm_max');
        $table->dropColumn('mdf_rpm_min');
        $table->dropColumn('mdf_wob_max');
        $table->dropColumn('mdf_wob_min');
        $table->dropColumn('mdf_pres_max');
        $table->dropColumn('mdf_pres_min');
        $table->dropColumn('diseno');
        $table->dropColumn('recibidopor');
        $table->dropColumn('aprobadopor');
        $table->dropColumn('previstopara');
        $table->dropColumn('preparadopor');
        $table->dropColumn('hora');
        $table->dropColumn('trailer');
        $table->dropColumn('generador');
        $table->dropColumn('proveedor');        
        $table->dropColumn('observa_herramientas');
        $table->dropColumn('nrotrabajo');

    });
    }
}
