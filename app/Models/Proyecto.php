<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model{

	protected $table= 'proyectos';
	protected $fillable= [
		'fecha','nrocta_cliente', 'idlocacion','idlistaprecios','idoperacion',
	'idservicio','programa_cliente','idpozo','id_cia_pu_wo_ct_drilling',
	'solicito','idpreparo','id_siam_casing','id_libraje','drift','diam_cano_ct',
	'tipo_fluido','o_t_f','cia_trepano','desc_oper','od_bolita','od_pines',
	'od_presion','sub_de_circulacion','sub_circ_pines','sub_circ_presion',
	'disco_ruptura','disco_presion','valor_corte','mdf_tipo','mdf_ps',
	'mdf_torque','mdf_overpull','mdf_backreaming','mdf_power','mdf_caudal_max',
	'mdf_caudal_min','mdf_rpm_max','mdf_rpm_min','mdf_wob_max','mdf_wob_min',
	'mdf_pres_max','mdf_pres_min','diseno','recibidopor','aprobadopor',
	'previstopara','preparadopor','hora','trailer','generador','proveedor', 'fechaymedio','tablet_imei','estado'];

	public function tipoHerramientas(){
		return $this->hasMany('App\Models\ProyectoTipoHerramienta');
	}

	public function operadores(){

		return $this->belongsToMany('App\Models\Usuario', 'proyecto_usuario');

	}

	public function herramientas(){

		return $this->belongsToMany('App\Models\Herramienta', 'proyecto_herramienta')->OrderBy("posicion","asc");

	}

	public function herramientasmano(){

		return $this->belongsToMany('App\Models\HerramientaMano', 'proyecto_herramienta_mano')->select('proyecto_herramienta_mano.id','nombre','estado');

	}
	public function vehiculorequisitos(){

		return $this->belongsToMany('App\Models\VehiculoRequisito', 'proyecto_vehiculo_requisito')->select('proyecto_vehiculo_requisito.id','nombre','estado');

	}

	public function cliente(){

		return $this->belongsTo('App\Models\Cliente', 'nrocta_cliente')->select("VTMCLH_NROCTA","VTMCLH_NOMBRE");

	}

	public function locacion(){

		return $this->belongsTo('App\Models\Locacion', 'idlocacion');

	}

	public function listadeprecios(){

		return $this->belongsTo('App\Models\ListaPrecio', 'idlistaprecios');

	}

	
	public function pozo(){

		return $this->belongsTo('App\Models\Pozo', 'idpozo')->select("USR_FCTPZO_CODIGO","USR_FCTPZO_DESCRP","locacion_id2");

	}

}
