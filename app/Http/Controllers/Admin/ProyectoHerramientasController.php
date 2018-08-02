<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\ProyectoHerramienta;

class ProyectoHerramientasController extends Controller{

	public function createHerramientas($id){

		return view('admin.proyectos.herramientas.create', [
			'proyecto' => Proyecto::find($id),
			'coleccionesHerramientas' => $this->coleccionesHerramientasDisponibles($id)
		]);

	}

	public function storeHerramientas(Request $request , $id){

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

	public function editHerramientas(Request $request, $id){

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

	public function updateHerramientas(Request $request, $id){

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

	private function coleccionesHerramientasDisponibles($id){

		$herramientasOcupadas= collect();
		$herramientasDisponibles= collect();
		$coleccionesHerramientasDisponibles= collect();

		foreach(Proyecto::all()->load('herramientas') as $proyecto){
			$herramientasOcupadas= $herramientasOcupadas->concat($proyecto->herramientas);
		}

		$proyecto= Proyecto::find($id)->load('tipoHerramientas');

		foreach($proyecto->tipoHerramientas as $tipoHerramienta){

			$herramientas= $tipoHerramienta->herramientas;

			foreach ($herramientas as $herramienta) {
				if(!$herramientasOcupadas->contains('id', $herramienta->id)){
					$herramientasDisponibles->push($herramienta);
				}
			}

			$coleccionesHerramientasDisponibles->push([$tipoHerramienta->nombre => $herramientasDisponibles]);
			$herramientasDisponibles= collect();

		}

		return $coleccionesHerramientasDisponibles;

	}

}
