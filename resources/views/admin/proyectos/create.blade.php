@extends('admin.template')

@section('content')

<div id="proyectos-app">
<form action="{{ route('admin.proyectos.store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

  <h3>Informacion General</h3>
    <clientes-field :clientes="{{ $clientes }}"></clientes-field>
     <div class="form-row">
       <div class="form-group col-md-4">
     <label for="servicio">Servicios a realizar</label>
      <select class="form-control" name="idservicio" id="idservicio">
           <option value="0">Seleccione</option>
           @foreach($servicios as $cadaservicio)
             <option value="{{ $cadaservicio->STMATI_DESCRP }}">{{ $cadaservicio->STMATI_DESCRP }}</option>
           @endforeach
          </select>
    </div>
    <div class="form-group col-md-4">
        <label for="preparo">Operación a realizar</label>
         <select class="form-control" name="idoperacion" id="idoperacion">
           <option value="0">Seleccione</option>
                   @foreach($operaciones as $cadaoperacion)
             <option value="{{ $cadaoperacion->nombre }}">{{ $cadaoperacion->nombre }}</option>
           @endforeach
          </select>


       </div>
           <div class="form-group col-md-2">
            <label for="programa_cliente">Programa del Cliente</label>
            <input type="file" name="programa_cliente" value="programa_cliente" size="80" />
         </div>

     </div>
     <div class="form-row">
       
       <div class="form-group col-md-4">
        <label for="cia_pu_wo_ct_drilling">Compañia de pu/wo/ct/drilling</label>
         <select class="form-control" name="id_cia_pu_wo_ct_drilling" id="id_cia_pu_wo_ct_drilling">
           <option value="0">Seleccione</option>
                 @foreach($ciapuwos as $cadacia)
             <option value="{{ $cadacia->USR_FCTEQP_DESCRP }}">{{ $cadacia->USR_FCTEQP_DESCRP }}</option>
           @endforeach
          </select>

       </div>
       <div class="form-group col-md-2">
        <label for="solicito">Solicitado por</label>
        <input type="text" class="form-control" name="solicito" id="solicito" placeholder="" />
       </div>
       <div class="form-group col-md-2">
        <label for="preparo">Preparado por</label>
         <select class="form-control" name="idpreparo" id="idpreparo">
           <option value="0">Seleccione</option>
                 @foreach($ingenieros as $cadaingeniero)
             <option value="{{ $cadaingeniero->id }}">{{ $cadaingeniero->name }}</option>
           @endforeach
          </select>


       </div>
<div class="form-group col-md-2">
      <label for="fechaymedio">Fecha Aprobado y Medio</label>
      <input type="file" name="fechaymedio" value="fechaymedio" size="80" />
    </div>
     </div>
     <h3>Informacion operativa</h3>
     <div class="form-row">
       <div class="form-group col-md-2">
        <label for="siam_casing">Diam.Casing</label>
        <select class="form-control" name="id_siam_casing" id="id_siam_casing">
           <option value="0">Seleccione</option>
                  <option value="1">casing 1</option>
                  <option value="2">casing 2</option>
          </select>
        </div>
        <div class="form-group col-md-1">
        <label for="libraje">Libraje</label>
        <select class="form-control" name="id_libraje" id="id_libraje">
           <option value="0">Seleccione</option>
                  <option value="1">Libraje 1</option>
                  <option value="2">Libraje 2</option>
          </select>
       </div>
        <div class="form-group col-md-1">
        <label for="drift">Drift</label>
        <input type="text" class="form-control" name="drift" id="drift" placeholder="" />
       </div>
        <div class="form-group col-md-2">
        <label for="diam_cano_ct">Dia Caño CT</label>
         <select class="form-control" name="diam_cano_ct" id="diam_cano_ct">
           <option value="0">Seleccione</option>
                 @foreach($ctdatos as $cadact)
             <option value="{{ $cadact->valor }}">{{ $cadact->valor }}</option>
           @endforeach
          </select>
       </div>
        <div class="form-group col-md-3">
        <label for="tipo_fluido">Tipo Fluido</label>
        <input type="text" class="form-control" name="tipo_fluido" id="tipo_fluido" placeholder="" />
       </div>
        <div class="form-group col-md-1">
        <label for="o_t_f">∅|T|F</label>
        <input type="text" class="form-control" name="o_t_f" id="o_t_f" placeholder="" />
       </div>
        <div class="form-group col-md-2">
        <label for="cia_trepano">Cia Trepano</label>
        <input type="text" class="form-control" name="cia_trepano" id="cia_trepano" placeholder="" />
       </div>

     </div>
     <div class="form-group">
    <label for="observaciones">Descripción Operativa</label>
    <textarea class="form-control" id="desc_oper" name="desc_oper" placeholder="Descripción" rows="5"></textarea>
  </div>



<div class="form-row">
     <div class="form-group col-md-3">
      <label for="diseno">Diseño</label>
      <input type="text" class="form-control" name="diseno" id="diseno" placeholder="Ingeniería de Aplicación" />
    </div>
    <div class="form-group col-md-3">
      <label for="aprobadopor">Aprobado por</label>
      <input type="text" class="form-control" name="aprobadopor" id="aprobadorpor" placeholder="Contacto del cliente" />
    </div>
    <div class="form-group col-md-3">
      <label for="previstopara">Previsto para</label>
     <input type="text" class="form-control" name="previstopara" id="previstopara" placeholder="fecha y hora" />
    </div>
    <div class="form-group col-md-2">
        <label for="preparo">Estado</label>
         <select class="form-control" name="estado" id="estado">
           <option value="0">Seleccione</option>
                   @foreach($estados as $cadaestado)
             <option value="{{ $cadaestado->id }}">{{ $cadaestado->nombre }}</option>
           @endforeach
          </select>
</div>
</div>

  <button type="submit" class="btn btn-primary  btn-block">Guardar</button>
</form>
</div>

@endsection

@section('scripts')

  <script src="{{ asset('dist/js/proyectos/proyectos-app.js') }}"></script>

@endsection
