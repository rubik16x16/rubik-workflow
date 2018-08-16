<?php

namespace App\Http\Controllers\Admin\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\ProyectoHerramienta;

class HerramientasController extends Controller{

	public function create($id){

		$proyecto= Proyecto::find($id)->load('tipoHerramientas');
		$herramientas= collect();
		foreach($proyecto->tipoHerramientas as $tipoHerramienta){
			$herramientas= $herramientas->concat($tipoHerramienta->herramientas());
		}

		return view('admin.proyectos.herramientas.create', [
			'proyecto' => $proyecto,
			'herramientas' => $herramientas
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

		$proyecto= Proyecto::find($id)->load('tipoHerramientas', 'herramientas');
		$herramientas= $proyecto->herramientas->map(function($herramienta){
			$herramienta->checked= true;
			return $herramienta;
		});

		foreach($proyecto->tipoHerramientas as $tipoHerramienta){
			$herramientas= $herramientas->concat($tipoHerramienta->herramientas()->map(function($herramienta){
				$herramienta->checked= false;
				return $herramienta;
			}));
		}

		return view('admin.proyectos.herramientas.edit', [
			'proyecto' => $proyecto,
			'herramientas' => $herramientas
		]);

	}

	public function update(Request $request, $id){

		ProyectoHerramienta::where('proyecto_id', $id)->delete();

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

}
