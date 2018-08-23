<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


use App\Models\Proyecto;
use App\Models\Usuario;
use App\Models\ProyectoUsuario;
use App\Models\ProyectoTipoHerramienta;
use App\Models\Cliente;
use App\Models\Pozo;
use App\Models\Servicio;
use App\Models\CiaPuWo;
use App\Models\ListaPrecio;
use App\Models\Locacion;
use App\Models\Operacion;
use App\Models\CTData;


class ProyectosController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

		$proyectos= Proyecto::all()->load('tipoHerramientas', 'herramientas', 'operadores');

		$usuario= Usuario::find(session('admin.id'));

		if($usuario->roles->contains('nombre', 'jefedetaller')){
			$proyectos= $proyectos->reject(function($proyecto){
				return $proyecto->estado == false;
			});
		}

    return view('admin.proyectos.index', [
			'proyectos' => str_replace('"', "'", $proyectos->load('cliente')->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'edit' => route('admin.proyectos.edit', ['id']),
        'destroy' => route('admin.proyectos.destroy', ['id']),
        'create' => route('admin.proyectos.create'),
				'show' => route('admin.proyectos.show', ['id']),
        'tipoHerramientas' => [
					'create' => route('admin.proyecto.tipoHerramientas.create', ['id']),
					'edit' => route('admin.proyecto.tipoHerramientas.edit', ['id'])
				],
				'herramientas' => [
					'create' => route('admin.proyecto.herramientas.create', ['id']),
					'edit' => route('admin.proyecto.herramientas.edit', ['id'])
				],
        'operadores' => [
          'create' => route('admin.proyecto.operadores.create', ['id']),
          'edit' => route('admin.proyecto.operadores.edit', ['id'])
        ]
      ]))
		]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

//dd(Cliente::select("VTMCLH_NROCTA","VTMCLH_NOMBRE")->where("VTMCLH_NROCTA","CAPSA")->OrderBy("VTMCLH_NOMBRE","DESC")->get()->load('locaciones', 'locaciones.pozos','listasdeprecios'));
		return view('admin.proyectos.create', [
			'clientes' => Cliente::select("VTMCLH_NROCTA","VTMCLH_NOMBRE")->OrderBy("VTMCLH_NOMBRE","DESC")->get()->load('locaciones', 'locaciones.pozos','listasdeprecios')->toJson(),
        //'clientes' => str_replace('"', "'", Cliente::take(80)->get()->load('locaciones', 'locaciones.pozos')->toJson()),
			'servicios' => Servicio::all()->where('USR_STMATI_APP','S'),
			'ciapuwos' => CiaPuWo::all(),
			'listaprecios' => ListaPrecio::all(),
			'operaciones' => Operacion::all(),
      'ctdatos' => CTData::all(),
			'ingenieros' => $this->operadoresIngenierosyCoordinadores()

		]);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $documentos= ['programa_cliente', 'fechaymedio'];
    $proyecto= new Proyecto($request->request->all());

    foreach ($documentos as $documento) {
      if($request->hasFile($documento)){
        $proyecto->$documento= $request->file($documento)->store('documentos', 'public');
      }
    }
    
		$proyecto->save();

		return redirect(route('admin.proyectos.index'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id){

		$proyecto= Proyecto::find($id)->load('herramientas', 'tipoHerramientas', 'operadores');

		return view('admin.proyectos.show', [
			'proyecto' => $proyecto
		]);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id){

		$proyecto= Proyecto::find($id)->load('locacion', 'pozo', 'cliente', 'cliente.locaciones', 'cliente.locaciones.pozos', 'locacion.pozos');

		return view('admin.proyectos.edit', [
			'proyecto' => $proyecto,
      'proyectoJson' => str_replace('"', "'", $proyecto->toJson()),
        'clientes' => Cliente::select("VTMCLH_NROCTA","VTMCLH_NOMBRE")->OrderBy("VTMCLH_NOMBRE","DESC")->get()->load('locaciones', 'locaciones.pozos')->toJson(),
			//'clientes' => str_replace('"', "'", Cliente::all()->load('locaciones', 'locaciones.pozos')->toJson()),
			'pozos' => Pozo::all(),
			'servicios' => Servicio::all()->where('USR_STMATI_APP','S'),
			'ciapuwos' => CiaPuWo::all(),
			'listaprecios' => ListaPrecio::all(),
			'locaciones' => Locacion::all(),
			'operaciones' => Operacion::all(),
      'ctdatos' => CTData::all(),
			'ingenieros' => $this->operadoresIngenierosyCoordinadores()

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

    $documentos= ['programa_cliente', 'fechaymedio'];

    $proyecto= Proyecto::find($id);

    foreach ($documentos as $documento) {
      if($proyecto->$documento != NULL){
        if($request->hasFile($documento)){
          if(Storage::disk('public')->exists($proyecto->$documento)){
            Storage::disk('public')->delete($proyecto->$documento);
          }
          $proyecto->$documento= $request->file($documento)->store('documentos', 'public');
        }
      }else{
        if($request->hasFile($documento)){
          $proyecto->$documento= $request->file($documento)->store('documentos', 'public');
        }
      }
    }

    $proyecto->fill($request->request->all());
		$proyecto->save();

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

  private function operadoresIngenierosyCoordinadores(){
  	$operadores = collect();
  	foreach(Usuario::all() as $usuario){
  		if(($usuario->roles->contains('nombre', 'Ingeniero')) or ($usuario->roles->contains('nombre', 'Coordinador')))
  			$operadores->push($usuario);
  	}
  	return $operadores;
  }
}
