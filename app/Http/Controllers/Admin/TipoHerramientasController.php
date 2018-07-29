<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\TipoHerramienta;

class TipoHerramientasController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return view('admin.tipoHerramientas.index',[
      'tipoHerramientas' => str_replace('"', "'", TipoHerramienta::all()->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'edit' => route('admin.tipoHerramientas.edit', ['id']),
        'destroy' => route('admin.tipoHerramientas.destroy', ['id']),
        'create' => route('admin.tipoHerramientas.create')
        ]))
    ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

    return view('admin.tipoHerramientas.create');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    TipoHerramienta::create($request->all());
    return redirect(route('admin.tipoHerramientas.index'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id){

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id){

    return view('admin.tipoHerramientas.edit',[
      'tipoHerramienta' => TipoHerramienta::find($id)
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

    $tipoHerramienta= TipoHerramienta::find($id);
    $tipoHerramienta->fill($request->all());
    $tipoHerramienta->save();
    return redirect(route('admin.tipoHerramientas.index'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){

    $tipoHerramienta= TipoHerramienta::find($id);
    $tipoHerramienta->delete();

  }
}
