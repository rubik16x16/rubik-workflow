<?php

namespace App\Http\Controllers\Admin\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\ProyectoHerramienta;
use App\Models\Tablet;
use App\Models\HerramientaMano;
use App\Models\VehiculoRequisito;

class HerramientasController extends Controller{

	public function create($id){

		$proyecto= Proyecto::find($id)->load('tipoHerramientas');
		$proyecto->tipoHerramientas->sortBy('posicion');
		$herramientas= collect();
		$test= collect(['nombre' => 'anthony', 'edad' => 18]);

		$proyecto->tipoHerramientas->each(function($tipoHerramienta){
			$tipoHerramienta->herramientas= $tipoHerramienta->herramientas();
		});

		return view('admin.proyectos.herramientas.create', [
			'proyecto' => $proyecto,
			'tipoHerramientas' => $proyecto->tipoHerramientas
		]);

	}

	public function store(Request $request , $id){

		foreach($request->all() as $clave => $valor){
			if(substr($clave, 0, 11) == 'herramienta'){

				$valor= explode('-', $valor);

				ProyectoHerramienta::create([
					'proyecto_id' => $id,
					'herramienta_id' => $valor[0],
					'posicion' => $valor[1]
				]);
			}
		}

		return redirect(route('admin.proyectos.index'));

	}

	public function edit(Request $request, $id){

		$proyecto= Proyecto::find($id)->load('tipoHerramientas', 'herramientas');

		$proyecto->tipoHerramientas->each(function($tipoHerramienta) use($proyecto){
			$tipoHerramienta->herramientas= $tipoHerramienta->herramientas();
			$tipoHerramienta->herramientas->each(function($herramienta){
				$herramienta->checked= false;
			});

			$proyecto->herramientas->each(function($herramienta) use($tipoHerramienta){
				if($herramienta->posicion() == $tipoHerramienta->posicion){
					$herramienta->checked= true;
					$tipoHerramienta->herramientas= $tipoHerramienta->herramientas->concat([$herramienta]);
				}
			});
		});

		return view('admin.proyectos.herramientas.edit', [
			'proyecto' => $proyecto,
			'tipoHerramientas' => $proyecto->tipoHerramientas
		]);

	}

public function check(Request $request, $id){

		$proyecto= Proyecto::find($id)->load('tipoHerramientas', 'herramientas','tablet');
		$proyectoherramientas = ProyectoHerramienta::where("proyecto_id",$id)->get()->load('herramientas');


function flatten($array) {
    $result = [];
    $indice = 0;
    foreach ($array as $item) {
    	$result[$indice]['inspec'] = $item->inspec;
    	$result[$indice]['prep'] = $item->prep;
    	$arreglo = $item->herramientas->toArray()[0];
    	foreach ($arreglo as $key => $value)
    		$result[$indice][$key] = $value;

    	$indice++;

    }
return collect($result);
}


$herramientas = flatten($proyectoherramientas);

				return view('admin.proyectos.herramientas.check', [
			'proyecto' => $proyecto,
			'herramientas' => $herramientas,
			'demano' => HerramientaMano::all(),
			'requisitos'=> VehiculoRequisito::all(),
			'tablet' => Tablet::whereRaw("(proyecto_id = 0 OR proyecto_id = $id)")->get()

		]);

	}

public function updatecheck(Request $request, $id){

		ProyectoHerramienta::where('proyecto_id', $id)->delete();

		foreach($request->all() as $clave => $valor){
			if(substr($clave, 0, 11) == 'herramienta'){
				ProyectoHerramienta::create([
					'proyecto_id' => $id,
					'herramienta_id' => $valor
				]);
			}
		}

		return redirect(route('admin.proyectos.index'));

	}


	public function update(Request $request, $id){

		ProyectoHerramienta::where('proyecto_id', $id)->delete();

		foreach($request->all() as $clave => $valor){
			if(substr($clave, 0, 11) == 'herramienta'){

				$valor= explode('-', $valor);

				ProyectoHerramienta::create([
					'proyecto_id' => $id,
					'herramienta_id' => $valor[0],
					'posicion' => $valor[1]
				]);
			}
		}

		return redirect(route('admin.proyectos.index'));

	}

}
