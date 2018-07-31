<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\Usuario;
use App\Models\ProyectoUsuario;
use App\Models\ProyectoTipoHerramienta;
use App\Models\TipoHerramienta;
use App\Models\ProyectoHerramienta;

class ProyectosController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return view('admin.proyectos.index', [
			'proyectos' => str_replace('"', "'", Proyecto::all()->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'edit' => route('admin.proyectos.edit', ['id']),
        'destroy' => route('admin.proyectos.destroy', ['id']),
        'create' => route('admin.proyectos.create'),
				'addHerramientas' => route('admin.proyectos.addHerramientas', ['id'])
        ]))
		]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

		return view('admin.proyectos.create', [
			'operadores' => $this->operadoresDisponibles(),
			'tipoHerramientas' => TipoHerramienta::all()
		]);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

		$proyecto= new Proyecto($request->all());
		$proyecto->save();

		foreach($request->all() as $clave => $valor){

			if(substr($clave, 0, 15) == 'tipoHerramienta'){
				ProyectoTipoHerramienta::create([
					'proyecto_id' => $proyecto->id,
					'tipo_herramienta_id' => $valor
				]);
			}

			if(substr($clave, 0, 8) == 'operador'){
				ProyectoUsuario::create([
					'proyecto_id' => $proyecto->id,
					'usuario_id' => $valor
				]);
			}
		}

		return redirect(route('admin.proyectos.index'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id){

		$proyecto= Proyecto::find($id)->load('operadores', 'tipoHerramientas');

		$operadores= $this->operadoresDisponibles();
		$tipoHerramientas= TipoHerramienta::all();

		foreach($tipoHerramientas as $tipoHerramienta){
			$tipoHerramienta->checked= $proyecto->tipoHerramientas->contains($tipoHerramienta) ? true : false;
		}

		foreach($proyecto->operadores as $operador){
			$operador->checked= true;
			$operadores->push($operador);
		}

		return view('admin.proyectos.edit', [
			'proyecto' => $proyecto,
			'operadores' => $operadores->sortBy('email'),
			'tipoHerramientas' =>$tipoHerramientas
		]);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id){

		$proyecto= Proyecto::find($id);
		$proyecto->fill($request->all());
		$proyecto->save();

		ProyectoUsuario::where('proyecto_id', $proyecto->id)->delete();
		ProyectoTipoHerramienta::where('proyecto_id', $proyecto->id)->delete();

		foreach($request->all() as $clave => $valor){

			if(substr($clave, 0, 15) == 'tipoHerramienta'){
				ProyectoTipoHerramienta::create([
					'proyecto_id' => $proyecto->id,
					'tipo_herramienta_id' => $valor
				]);
			}

			if(substr($clave, 0, 8) == 'operador'){
				ProyectoUsuario::create([
					'proyecto_id' => $proyecto->id,
					'usuario_id' => $valor
				]);
			}

		}

		return redirect(route('admin.proyectos.index'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){

		$proyecto= Proyecto::find($id);
		$proyecto->delete();

  }

	public function addHerramientas($id){

		$coleccionesHerramientas= collect();
		$proyecto= Proyecto::find($id)->load('tipoHerramientas');

		foreach($proyecto->tipoHerramientas as $tipoHerramienta){
			$coleccionesHerramientas->push([$tipoHerramienta->nombre => $tipoHerramienta->herramientas]);
		}

		return view('admin.proyectos.addHerramientas', [
			'proyecto' => $proyecto,
			'coleccionesHerramientas' => $coleccionesHerramientas
		]);

	}

	public function storeHerramientas(Request $request , $id){

		$proyecto= Proyecto::find($id);

		foreach($request->all() as $clave => $valor){
			if(substr($clave, 0, 11) == 'herramienta'){
				ProyectoHerramienta::create([
					'proyecto_id' => $proyecto->id,
					'herramienta_id' => $valor
				]);
			}
		}

		return redirect(route('admin.proyectos.index'));

	}

	private function operadoresDisponibles(){

		$operadoresOcupados= collect();
		$operadoresDisponibles= collect();

		foreach(Proyecto::all()->load('operadores') as $proyecto){
			foreach ($proyecto->operadores as $operador) {
				$operadoresOcupados->push($operador);
			}
		}

		$operadoresActivos= Usuario::all()->load('roles')->reject(function($usuario){
			return $usuario->estado == false;
		})->filter(function($usuario){
			$roles= $usuario->roles->map(function($rol){
				return $rol->nombre;
			});
			return in_array('Operario', $roles->toArray());
		});

		foreach($operadoresActivos as $operador){
			if(!$operadoresOcupados->contains('id', $operador->id)){
				$operadoresDisponibles->push($operador);
			}
		}

		return $operadoresDisponibles;

	}
}
