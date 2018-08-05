@extends('admin.template')

@section('content')

<h2 class="text-center">Nuevo proyecto</h2>

<form action="{{ route('admin.proyectos.store') }}" method="post">
  {{ csrf_field() }}

  <h3>Informacion General</h3>

  <div class="form-row">

    <div class="form-group col-md-5">
      <label for="cliente">Cliente</label>
      <select name="cliente_id" class="form-control" id="cliente"></select>
    </div>

    <div class="form-group col-md-5">
      <label for="locacion">Locacion</label>
      <input type="text" class="form-control" id="locacion" placeholder="Locacion">
    </div>

    <div class="form-group col-md-2">
      <label for="fecha">Fecha</label>
      <input type="date" class="form-control" id="fecha">
    </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="servicio">Servicios a realizar</label>
      <input type="text" class="form-control" id="servicio" placeholder="Servicios a realizar">
    </div>

    <div class="form-group col-md-6">
      <label for="programa">Programa del cliente</label>
      <input type="text" class="form-control" id="programa" placeholder="Programa del cliente">
    </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="compañia">Compañia de PU/WO/CT/DRILLING</label>
      <input type="text" class="form-control" id="compañia" placeholder="Compañia de PU/WO/CT/DRILLING">
    </div>

    <div class="form-group col-md-4">
      <label for="solicitante">Solicitado por</label>
      <input type="text" class="form-control" id="solicitante" placeholder="Solicitado por">
    </div>

    <div class="form-group col-md-4">
      <label for="preparador">Preparado por</label>
      <input type="text" class="form-control" id="preparador" placeholder="Preparado por">
    </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="pozo">Nro. Pozo</label>
      <input type="text" class="form-control" id="pozo" placeholder="Nro pozo">
    </div>

    <div class="form-group col-md-3">
      <label for="pozo">Nro. Hoja de trabajo</label>
      <input type="text" class="form-control" id="pozo" placeholder="Nro hoja de trabajo">
    </div>

  </div>

  <h3>Informacion operativa</h3>

  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="diam.casing">Diam.casing</label>
      <input type="text" class="form-control" id="diam.casing" placeholder="diam.casing">
    </div>

    <div class="form-group col-md-4">
      <label for="libraje">Libraje</label>
      <input type="text" class="form-control" id="libraje" placeholder="Libraje">
    </div>

    <div class="form-group col-md-4">
      <label for="drift">Drift</label>
      <input type="text" class="form-control" id="drift" placeholder="Drift">
    </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="diacaño">Dia caño ct</label>
      <input type="text" class="form-control" id="diacaño" placeholder="diam.casing">
    </div>

    <div class="form-group col-md-3">
      <label for="fluido">Tipo fluido</label>
      <input type="text" class="form-control" id="fluido" placeholder="Tipo fluido">
    </div>

    <div class="form-group col-md-3">
      <label for="test1">0 | T | F</label>
      <input type="text" class="form-control" id="test1" placeholder="">
    </div>

    <div class="form-group col-md-3">
      <label for="ciatrapano">Cia trapano</label>
      <input type="text" class="form-control" id="ciatrapano" placeholder="">
    </div>

  </div>

  <div class="form-group">
    <label for="descripcion">Descripcion de la operacion</label>
    <textarea class="form-control" id="descripcion" placeholder="Descripcion de la operacion" rows="5"></textarea>
  </div>

  <div class="row">

    <div class="col-6">
      <div class="card text-center">
        <div class="card-header">
          Tipos de herramientas
        </div>
        <div class="card-body table-responsive" style="height: 200px">
          <table class="table table-striped table-borderless">
            <thead class="thead-dark">
              <th>Tipo de Herramienta</th>
              <th>Usar</th>
            </thead>
            <tbody>
              @foreach($tipoHerramientas as $tipoHerramienta)
              <tr>
                <td>{{ $tipoHerramienta->nombre }}</td>
                <td><input type="checkbox" name="tipoHerramienta-{{ $tipoHerramienta->id }}" value="{{ $tipoHerramienta->id }}"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card text-center">
        <div class="card-header">
          Asignar Operadores
        </div>
        <div class="card-body table-responsive combo-box" style="height: 200px">
          <table class="table table-striped table-borderless">
            <thead class="thead-dark">
              <th>Email</th>
              <th>Asignar</th>
            </thead>
            <tbody>
              @foreach($operadores as $operador)
              <tr>
                <td>{{ $operador->email }}</td>
                <td><input type="checkbox" name="operador-{{ $operador->id }}" value="{{ $operador->id }}"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div class="form-group">
    <label for="observaciones">Observaciones</label>
    <textarea class="form-control" id="observaciones" placeholder="Observaciones" rows="5"></textarea>
  </div>

  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="largo">Largo</label>
      <input type="text" class="form-control" id="largo" placeholder="Largo">
    </div>

    <div class="form-group col-md-3">
      <label for="bolita">OD bolita</label>
      <input type="text" class="form-control" id="bolita" placeholder="Od Bolita">
    </div>

    <div class="form-group col-md-3">
      <label for="pines-de-corte">Pines de corte</label>
      <input type="text" class="form-control" id="pines-de-corte" placeholder="Pines de corte">
    </div>

    <div class="form-group col-md-3">
      <label for="presion">Presion Act.</label>
      <input type="text" class="form-control" id="presion" placeholder="Presion Act.">
    </div>

  </div>

  

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
