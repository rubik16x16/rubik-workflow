<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{

	protected $table= 'proyectos';
	protected $fillable= ['estado','nrocta_cliente','locacion','fecha','servicio','programa_cliente','n_pozo','cia_pu_wo_ct_drilling','solicito','preparo','siam_casing','libraje','drift','diam_cano_ct','tipo_fluido','o_t_f','cia_trepano','desc_oper','od_bolita','od_pines','od_presion','sub_de_circulacion','sub_circ_pines','sub_circ_presion','disco_ruptura','disco_presion','valor_corte','mdf_tipo','mdf_ps','mdf_torque','mdf_overpull','mdf_backreaming','mdf_power','mdf_caudal_max','mdf_caudal_min','mdf_rpm_max','mdf_rpm_min','mdf_wob_max','mdf_wob_min','mdf_pres_max','mdf_pres_min','diseno','recibidopor','aprobadopor','previstopara','preparadopor','hora','trailer','generador','proveedor'];

	public function operadores(){

		return $this->belongsToMany('App\Models\Usuario', 'proyecto_usuario');

	}

	public function tipoHerramientas(){

		return $this->belongsToMany('App\Models\TipoHerramienta', 'proyecto_tipo_herramienta');

	}

	public function herramientas(){

		return $this->belongsToMany('App\Models\Herramienta', 'proyecto_herramienta');

	}

}
