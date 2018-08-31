@extends('admin.template')

@section('content')

<h2>{{ $proyecto->cliente->VTMCLH_NOMBRE }}</h2>

<form action="" method="post">
  {{ csrf_field() }}
	@method('PUT')

  <h4 class="text-center">Controlar Herramientas</h2>

    <table class="table text-center">
      <thead class="thead-dark">
        <th>Tool</th>
        <th>OD</th>
        <th>LG</th>
        <th>Type</th>
        <th>Descripción</th>
        <th>top connec</th>
        <th>bottom connec</th>
        <th>PN</th>
        <th>SN</th>
        <th>Inspec</th>
        <th>Prep</th>
      </thead>
      <tbody>
        @foreach($herramientas as $herramienta)
        <tr>
          <td>{{ $herramienta['tool'] }}</td>
          <td>{{ $herramienta['od'] }}</td>
          <td>{{ $herramienta['largo'] }}</td>
          <td>{{ $herramienta['type'] }}</td>
          <td>{{ $herramienta['descrip'] }}</td>
          <td>{{ $herramienta['top_conec'] }}</td>
          <td>{{ $herramienta['bottom_conec'] }}</td>
          <td>{{ $herramienta['partnumber'] }}</td>
          <td>{{ $herramienta['nroserie'] }}</td>
          <td><input type="checkbox" name="checkinsp-{{ $herramienta['id'] }}" value="{{ $herramienta['id'] }}" @if($herramienta['inspec']) checked @endif></td>
          <td><input type="checkbox" name="checkprep-{{ $herramienta['id'] }}" value="{{ $herramienta['id'] }}" @if($herramienta['prep']) checked @endif></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <table class="table text-center">
      <thead class="thead-dark">
        <th>Herramientas de Mano</th>
        <th>Prep</th>
      </thead>
      <tbody>
        @foreach($demano as $herramienta)
        <tr>
          <td>{{ $herramienta['nombre'] }}</td>
          <td><input type="checkbox" name="checkprep-{{ $herramienta['id'] }}" value="{{ $herramienta['id'] }}" @if($herramienta['prep']) checked @endif></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <table class="table text-center">
      <thead class="thead-dark">
        <th>Requisitos Vehiculo</th>
        <th>Prep</th>
      </thead>
      <tbody>
        @foreach($requisitos as $herramienta)
        <tr>
          <td>{{ $herramienta['nombre'] }}</td>
          <td><input type="checkbox" name="checkprep-{{ $herramienta['id'] }}" value="{{ $herramienta['id'] }}" @if($herramienta['prep']) checked @endif></td>
        </tr>
        @endforeach
      </tbody>
    </table>
<div class="form-group col-md-4">
     <label  for="tablet_imei">Tablet</label>
      <select class="form-control" name="tablet_imei" id="tablet_imei">
           <option value="0">Seleccione</option>
            @foreach($tablet as $cadaimei)
                  @if ($proyecto->tablet_imei == $cadaimei->id)
                  <option value="{{ $cadaimei->id }}" selected="selected">{{ $cadaimei->imei}}</option>
                  @else
                    <option value="{{ $cadaimei->id }}">{{ $cadaimei->imei }}</option>
                    @endif
                  @endforeach
          </select>
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
