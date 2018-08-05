@extends('admin.template')

@section('content')

<form action="{{ route('admin.proyectos.update', ['id' => $proyecto->id]) }}" method="post">
  {{ csrf_field() }}
	@method('PUT')
<div class="panel panel-default" >
<div class="panel-heading">
     <p class="labelformulario1">INFORMACION GENERAL</p>
     <div class="row ">
        <div class="col-md-5 col-sm-5 col-xs-5">
            <span class="labelformulario1" >CLIENTE</span>
             {{ $proyecto->nrocta_cliente }}
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5">
                  <span class="labelformulario1" >LOCACION</span>
                  <input type="text" name="locacion" id="locacion" class="form-control" placeholder="" value="{{$proyecto->locacion}}"/>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
                  <span class="labelformulario1">FECHA</span>
                  <input type="text" class="form-control" name="fecha" id="fecha" placeholder="{{date('d/m/Y')}}" value="{{$proyecto->fecha}}" />
       </div>
      </div>   
     <div class="row ">
       <div class="col-md-6 col-sm-6 col-xs-6">
     <span class="labelformulario1">SERVICIOS A REALIZAR</span>
     <input type="text" class="form-control" name="servicio" id="servicio" placeholder="" value="{{$proyecto->servicio}}"/>
    </div>
           <div class="col-md-6 col-sm-6 col-xs-6">
            <span class="labelformulario1">PROGRAMA DEL CLIENTE</span>
     <input type="text" class="form-control" name="programa_cliente" id="programa_cliente" placeholder="" value="{{$proyecto->programa_cliente}}"/>
    </div>
     </div>
     <div class="row ">
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">NRO POZO</span>
        <input type="text" class="form-control" name="n_pozo" id="n_pozo" placeholder="" value="{{$proyecto->n_pozo}}"/>
       </div>
       <div class="col-md-4 col-sm-4 col-xs-4">
        <span class="labelformulario1">COMPAÑIA DE PU/WO/CT/DRILLING</span>
        <input type="text" class="form-control" name="cia_pu_wo_ct_drilling" id="cia_pu_wo_ct_drilling" placeholder="" value="{{$proyecto->cia_pu_wo_ct_drilling}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">SOLICITADO POR</span>
        <input type="text" class="form-control" name="solicito" id="solicito" placeholder="" value="{{$proyecto->solicito}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">PREPARADO POR</span>
        <input type="text" class="form-control" name="preparo" id="preparo" placeholder="" value="{{$proyecto->preparo}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">HOJA DE TRABAJO NRO</span>
        <input type="text" class="form-control" name="nrotrabajo" id="nrotrabajo" placeholder="" value="{{$proyecto->nrotrabajo}}"/>
       </div>
     </div>
     <p class="labelformulario1">INFORMACION OPERATIVA</p>
     <div class="row">
       <div class="col-md-1 col-sm-1 col-xs-1">
        <span class="labelformulario1">DIAM.CASING</span>
        <input type="text" class="form-control" name="siam_casing" id="siam_casing" placeholder="" value="{{$proyecto->siam_casing}}"/>
       </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
        <span class="labelformulario1">LIBRAJE</span>
        <input type="text" class="form-control" name="libraje" id="libraje" placeholder="" value="{{$proyecto->libraje}}"/>
       </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
        <span class="labelformulario1">DRIFT</span>
        <input type="text" class="form-control" name="drift" id="drift" placeholder="" value="{{$proyecto->drift}}"/>
       </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
        <span class="labelformulario1">DIA CAÑO CT</span>
        <input type="text" class="form-control" name="diam_cano_ct" id="diam_cano_ct" placeholder="" value="{{$proyecto->diam_cano_ct}}"/>
       </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">TIPO FLUIDO</span>
        <input type="text" class="form-control" name="tipo_fluido" id="tipo_fluido" placeholder="" value="{{$proyecto->tipo_fluido}}"/>
       </div>
        <div class="col-md-1 col-sm-1 col-xs-1">
        <span class="labelformulario1">0 | T | F</span>
        <input type="text" class="form-control" name="o_t_f" id="o_t_f" placeholder="" value="{{$proyecto->o_t_f}}"/>
       </div>
        <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">CIA TRAPANO</span>
        <input type="text" class="form-control" name="cia_trepano" id="cia_trepano" placeholder="" value="{{$proyecto->cia_trepano}}"/>
       </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
        <span class="labelformulario1">DESCRIPCION OPERACION</span>
        <input type="text" class="form-control" name="desc_oper" id="desc_oper" placeholder="" value="{{$proyecto->desc_oper}}"/>
       </div>
     </div>
    
   <div class="row">
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">OD BOLITA</span>
        <input type="text" class="form-control" name="od_bolita" id="od_bolita" placeholder="" value="{{$proyecto->od_bolita}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">PINES DE CORTE</span>
        <input type="text" class="form-control" name="od_pines" id="od_pines" placeholder="" value="{{$proyecto->od_pines}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">PRESION ACT.</span>
        <input type="text" class="form-control" name="od_presion" id="od_presion" placeholder="" value="{{$proyecto->od_presion}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">SUB DE CIRCULACION</span>
        <input type="text" class="form-control" name="sub_de_circulacion" id="sub_de_circulacion" placeholder="" value="{{$proyecto->sub_de_circulacion}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">PINES DE CORTE</span>
        <input type="text" class="form-control" name="sub_circ_pines" id="sub_circ_pines" placeholder="" value="{{$proyecto->sub_circ_pines}}"/>
       </div>
       <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">PRESION ACT.</span>
        <input type="text" class="form-control" name="sub_circ_presion" id="sub_circ_presion" placeholder="" value="{{$proyecto->sub_circ_presion}}"/>
       </div>
       
  </div>      
<div class="row">
       <div class="col-md-4 col-sm-4 col-xs-4">
        <span class="labelformulario1">DISCO DE RUPTURA</span>
        <input type="text" class="form-control" name="disco_ruptura" id="disco_ruptura" placeholder="" value="{{$proyecto->disco_ruptura}}"/>
       </div>
       <div class="col-md-4 col-sm-4 col-xs-4">
        <span class="labelformulario1">PRESION ACT.</span>
        <input type="text" class="form-control" name="disco_presion" id="disco_presion" placeholder="" value="{{$proyecto->disco_presion}}"/>
       </div>
       <div class="col-md-4 col-sm-4 col-xs-4">
        <span class="labelformulario1">VALOR CORTE POR PRESION DIFERENCIAL</span>
        <input type="text" class="form-control" name="valor_corte" id="valor_corte" placeholder="" value="{{$proyecto->valor_corte}}"/>
       </div>
  
</div>
   <p class="labelformulario1">MOTOR DE FONDO</p>
<div class="row">
   <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">TIPO</span>
        <input type="text" class="form-control" name="mdf_tipo" id="mdf_tipo" placeholder="" value="{{$proyecto->mdf_tipo}}"/>
       </div>
   <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">PS</span>
        <input type="text" class="form-control" name="mdf_ps" id="mdf_ps" placeholder="" value="{{$proyecto->mdf_ps}}"/>
       </div>
   <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">TORQUE CON</span>
        <input type="text" class="form-control" name="mdf_torque" id="mdf_torque" placeholder="" value="{{$proyecto->mdf_torque}}"/>
       </div>
   <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">BIT OVERPULL MAX</span>
        <input type="text" class="form-control" name="mdf_overpull" id="mdf_overpull" placeholder="" value="{{$proyecto->mdf_overpull}}"/>
       </div>
   <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">BACKREAMING</span>
        <input type="text" class="form-control" name="mdf_backreaming" id="mdf_backreaming" placeholder="" value="{{$proyecto->mdf_backreaming}}"/>
       </div>
   <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">POWER</span>
        <input type="text" class="form-control" name="mdf_power" id="mdf_power" placeholder="" value="{{$proyecto->mdf_power}}"/>
       </div>
    
  </div>
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">CAUDAL</span>
      <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MIN</span>
        <input type="text" class="form-control" name="mdf_caudal_min" id="mdf_caudal_minque " placeholder="" value="{{$proyecto->mdf_caudal_min}}"/>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MAX</span>
        <input type="text" class="form-control" name="mdf_caudal_max" id="mdf_caudal_max" placeholder="" value="{{$proyecto->mdf_caudal_max}}"/>
      </div>
    </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">RPM</span>
      <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MIN</span>
        <input type="text" class="form-control" name="mdf_rpm_min" id="mdf_rpm_min" placeholder="" value="{{$proyecto->mdf_rpm_min}}"/>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MAX</span>
        <input type="text" class="form-control" name="mdf_rpm_max" id="mdf_rpm_max" placeholder="" value="{{$proyecto->mdf_rpm_max}}"/>
      </div>
    </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">WOB</span>
      <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MIN</span>
        <input type="text" class="form-control" name="mdf_wob_min" id="mdf_wob_min" placeholder="" value="{{$proyecto->mdf_wob_min}}"/>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MAX</span>
        <input type="text" class="form-control" name="mdf_wob_max" id="mdf_wob_max" placeholder="" value="{{$proyecto->mdf_wob_max}}"/>
      </div>
    </div>
    </div>
     <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">DIF.PRESION</span>
      <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MIN</span>
        <input type="text" class="form-control" name="mdf_pres_min" id="mdf_pres_min" placeholder="" value="{{$proyecto->mdf_pres_min}}"/>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-2">
        <span class="labelformulario1">MAX</span>
        <input type="text" class="form-control" name="mdf_pres_max" id="mdf_pres_max" placeholder="" value="{{$proyecto->mdf_pres_max}}"/>
      </div>
    </div>
    </div>
   </div>
<div class="row">
     <div class="col-md-4 col-sm-4 col-xs-4">
      <span class="labelformulario1">DISEÑO</span>
      <input type="text" class="form-control" name="diseno" id="diseno" placeholder="Ingeniería de Aplicación" value="{{$proyecto->diseno}}"/>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
      <span class="labelformulario1">APROBADO POR</span>
      <input type="text" class="form-control" name="aprobadopor" id="aprobadorpor" placeholder="Contacto del cliente" value="{{$proyecto->aprobadopor}}"/>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
      <span class="labelformulario1">FECHA Y MEDIO</span>
      <input type="text" class="form-control" name="fechaymedio" id="fechaymedio" placeholder="" value="{{$proyecto->fechaymedio}}"/>
    </div>
</div>
<div class="row">
  <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">RECIBIDO POR</span>
      <input type="text" class="form-control" name="recibidopor" id="recibidopor" placeholder="Resp. de Operación" value="{{$proyecto->recibidopor}}"/>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">PREVISTO PARA</span>
      <input type="text" class="form-control" name="previstopara" id="previstopara" placeholder="fecha y hora" value="{{$proyecto->previstopara}}"/>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">PREPARADO POR</span>
      <input type="text" class="form-control" name="preparadopor" id="preparadopor" placeholder="" value="{{$proyecto->preparadopor}}"/>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3">
      <span class="labelformulario1">FECHA Y HORA</span>
      <input type="text" class="form-control" name="hora" id="hora" placeholder="" value="{{$proyecto->hora}}"/>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
