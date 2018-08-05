@extends('admin.template')

@section('content')

<h2>{{ $proyecto->nombre }}</h2>

	<div class="card">
	  <h5 class="card-header text-center">Recursos</h5>
	  <div class="card-body">
			<div class="row">

				<div class="col-4 table-responsive">
					<table class="table table-striped table-borderless text-center">
						<thead class="thead-dark">
							<th>Operadores</th>
						</thead>
						<tbody>
							@foreach($proyecto->operadores as $operador)
							<tr>
								<td>{{ $operador->email }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="col-4 table-responsive">
					<table class="table table-striped table-borderless text-center">
						<thead class="thead-dark">
							<th>Herramientas requeridas</th>
						</thead>
						<tbody>
							@foreach($proyecto->tipoHerramientas as $tipoHerramienta)
							<tr>
								<td>{{ $tipoHerramienta->nombre }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="col-4 table-responsive">
					<table class="table table-striped table-borderless text-center">
						<thead class="thead-dark">
							<th>Herramientas requeridas</th>
						</thead>
						<tbody>
							@foreach($proyecto->herramientas as $herramienta)
							<tr>
								<td>{{ $herramienta->tipo->nombre . ':' . $herramienta->id }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>
	  </div>
	</div>

@endsection
