@php

$atributosProyecto = array('id','cliente','locacion','fecha','servicio','programa_cliente','n_pozo','cia_pu_wo_ct_drilling','solicito','preparo','siam_casing','libraje','drift','diam_cano_ct','tipo_fluido','o_t_f','cia_trepano','desc_oper','od_bolita','od_pines','od_presion','sub_de_circulacion','sub_circ_pines','sub_circ_presion','disco_ruptura','disco_presion','valor_corte','mdf_tipo','mdf_ps','mdf_torque','mdf_overpull','mdf_backreaming','mdf_power','mdf_caudal_max','mdf_caudal_min','mdf_rpm_max','mdf_rpm_min','mdf_wob_max','mdf_wob_min','mdf_pres_max','mdf_pres_min','diseno','recibidopor','aprobadopor','previstopara','preparadopor','hora','trailer','generador','proveedor');


$atributosHerramienta = array('n','desc','inspecion','serie','id','od','largo','top_con','botton_con');

// atributos calculables

$proyecto->cliente = $nombreCliente;


$json = '{';
$json .= '"data": {';
$json .= '"project": {';

foreach ($atributosProyecto as $cadaatributo){
	if (empty($proyecto->{$cadaatributo})) $proyecto->{$cadaatributo} = "Ejemplo".$cadaatributo;	
	$json .= '"'.$cadaatributo.'":"'.$proyecto->{$cadaatributo}.'",';	
}

$json .= '"herramientas": [{';

foreach($proyecto->herramientas as $herramienta){
	foreach ($atributosHerramienta as $cadaherramienta){
		if (empty($herramienta->{$cadaherramienta})) $herramienta->{$cadaherramienta} = "Ejemplo".$cadaherramienta;	
		$json .= '"'.$cadaherramienta.'":"'.$herramienta->{$cadaherramienta}.'",';	
	}

$json = substr($json, 0, -1);
$json .= '},';
}

$json = substr($json, 0, -1);
$json .= ']';

$json .= '}';
$json .= '},';

$json .= '"estado:"'.$proyecto->estado.'",';
$json .= '"mensaje":""';
$json .= '}';

echo $json;

@endphp