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
      'roles' => Rol::all()
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

    $secciones= Seccion::all()->map(function($seccion){
      return $seccion->nombre;
    });

    $rol= new Rol($request->all());
    $rol->save();

    foreach($request->all() as $clave => $valor){
      $permiso= explode('-', $clave);
      if(count($permiso) > 1){
        $seccion= $permiso[0];
        $tipo= $permiso[1];
        if(in_array($seccion, $secciones->toArray())){
          $permiso= new Permiso(['seccion'=> $seccion, 'tipo' => $tipo, 'rol_id' => $rol->id]);
          $permiso->save();
        }
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
        if($permiso->seccion == $seccion->nombre){
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

    $secciones= Seccion::all()->map(function($seccion){
      return $seccion->nombre;
    });

    $rol= Rol::find($id);
    $rol->fill($request->all());
    $rol->save();

    Permiso::where('rol_id', $id)->delete();

    foreach($request->all() as $clave => $valor){
      $permiso= explode('-', $clave);
      if(count($permiso) > 1){
        $seccion= $permiso[0];
        $tipo= $permiso[1];
        if(in_array($seccion, $secciones->toArray())){
          $permiso= new Permiso(['seccion'=> $seccion, 'tipo' => $tipo, 'rol_id' => $rol->id]);
          $permiso->save();
        }
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
