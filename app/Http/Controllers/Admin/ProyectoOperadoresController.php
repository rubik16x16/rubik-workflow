<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\ProyectoUsuario;
use App\Models\Usuario;

class ProyectoOperadoresController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id){

    $proyecto= Proyecto::find($id);

    return view('admin.proyectos.operadores.create', [
      'proyecto' => $proyecto,
      'routes' => str_replace('"', "'", json_encode([
        'getRecords' => route('api.admin.operadores.index'),
        'storeOperadores' => route('admin.proyecto.operadores.store', ['id' => $proyecto->id])
      ])),
      'operadores' => str_replace('"', "'", $this->operadoresDisponibles()->toJson())
    ]);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id){

    $operadoresIds= explode(':', $request->operadores);
    foreach ($operadoresIds as $operadorId) {
      ProyectoUsuario::create([
        'proyecto_id' => $id,
        'usuario_id' => $operadorId
      ]);
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
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
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
