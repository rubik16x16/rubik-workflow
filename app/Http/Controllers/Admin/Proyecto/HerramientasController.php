<?php

namespace App\Http\Controllers\Admin\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\ProyectoHerramienta;

class HerramientasController extends Controller{

	public function create($id){

		$proyecto= Proyecto::find($id)->load('tipoHerramientas');
		foreach($proyecto->tipoHerramientas as $tipoHerramienta){
			$tipoHerramienta->herramientas= $tipoHerramienta->herramientas();
		}

		return view('admin.proyectos.herramientas.create', [
			'proyecto' => $proyecto,
		]);

	}

	public function store(Request $request , $id){

		foreach($request->all() as $clave => $valor){
			if(substr($clave, 0, 11) == 'herramienta'){
				ProyectoHerramienta::create([
					'proyecto_id' => $id,
					'herramienta_pn' => $valor
				]);
			}
		}

		return redirect(route('admin.proyectos.index'));

	}

	public function edit(Request $request, $id){

		$proyecto= Proyecto::find($id);
		$coleccionesHerramientasDisponibles= $this->coleccionesHerramientasDisponibles($id);


		foreach($coleccionesHerramientasDisponibles as $key => &$coleccionHerramientasDisponibles){
			foreach($coleccionHerramientasDisponibles as $tipoHerramienta => &$herramientas){
				$herramientas= $herramientas->concat($proyecto->herramientas->filter(function($herramienta) use ($tipoHerramienta){
					return $herramienta->tipo->nombre == $tipoHerramienta;
				}));
				foreach ($herramientas as $herramienta) {
					$herramienta->checked= $proyecto->herramientas->contains($herramienta) ? true : false;
				}
				$coleccionHerramientasDisponibles[$tipoHerramienta]= $herramientas->sortBy('id');
			}
			$coleccionesHerramientasDisponibles[$key] = $coleccionHerramientasDisponibles;
		}

		return view('admin.proyectos.herramientas.edit', [
			'proyecto' => $proyecto,
			'coleccionesHerramientas' => $coleccionesHerramientasDisponibles
		]);

	}

	public function update(Request $request, $id){

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

}
