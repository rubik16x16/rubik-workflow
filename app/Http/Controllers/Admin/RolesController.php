<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Rol;
use App\Models\Seccion;
use App\Models\Permiso;

class RolesController extends Controller{

  private $permisos= ['lista', 'editar', 'agregar', 'eliminar'];
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return view('admin.roles.index',[
      'roles' => str_replace('"', "'", Rol::all()->load('permisos')->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'edit' => route('admin.roles.edit', ['id']),
        'destroy' => route('admin.roles.destroy', ['id']),
        'create' => route('admin.roles.create')
        ]))
    ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

    return view('admin.roles.create', [
      'secciones' => Seccion::all(),
      'permisos' => $this->permisos
    ]);

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $rol= new Rol($request->all());
    $rol->save();

    foreach($request->all() as $clave => $valor){
      $permiso= explode('-', $clave);
      if(count($permiso) > 1){
        $seccionId= $permiso[0];
        $tipo= $permiso[1];
        $permiso= new Permiso(['seccion_id'=> $seccionId, 'tipo' => $tipo, 'rol_id' => $rol->id]);
        $permiso->save();
      }
    }

    return redirect(route('admin.roles.index'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id){
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id){

    $rol= Rol::find($id)->load('permisos');
    $secciones= Seccion::all();
    $seccionPermiso= [];

    foreach($secciones as $seccion){
      foreach($rol->permisos as $permiso){
        if($permiso->seccion->nombre == $seccion->nombre){
          $seccionPermiso[]= $permiso->tipo;
        }
      }
      $seccion->permisos= $seccionPermiso;
      $seccionPermiso= [];
    }

    return view('admin.roles.edit',[
      'rol' => $rol,
      'secciones' => $secciones,
      'permisos' => $this->permisos
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

    $rol= Rol::find($id);
    $rol->fill($request->all());
    $rol->save();

    Permiso::where('rol_id', $id)->delete();

    foreach($request->all() as $clave => $valor){
      $permiso= explode('-', $clave);
      if(count($permiso) > 1){
        $seccionId= $permiso[0];
        $tipo= $permiso[1];
        $permiso= new Permiso(['seccion_id'=> $seccionId, 'tipo' => $tipo, 'rol_id' => $rol->id]);
        $permiso->save();
      }
    }

    return redirect(route('admin.roles.index'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){

    $rol= Rol::find($id);
    $rol->delete();

  }
}
