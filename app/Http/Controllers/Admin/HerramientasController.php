<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Herramienta;
use App\Models\TipoHerramienta;

class HerramientasController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return view('admin.herramientas.index',[
      'routes' => str_replace('"', "'", json_encode([
        'index' => route('admin.herramientas.api.index'),
        'edit' => route('admin.herramientas.edit', ['id']),
        'destroy' => route('admin.herramientas.destroy', ['id']),
        'create' => route('admin.herramientas.create')
        ]))
    ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

    return view('admin.herramientas.create', [
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

    Herramienta::create($request->all());
    return redirect(route('admin.herramientas.index'));

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

		return view('admin.herramientas.edit', [
			'herramienta' => Herramienta::find($id)->load('tool'),
			'tipoHerramientas' => TipoHerramienta::all()
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

		$herramienta= Herramienta::find($id);
		$herramienta->fill($request->all());
		$herramienta->save();
		return redirect(route('admin.herramientas.index'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){

		$herramienta= Herramienta::find($id);
		$herramienta->delete();

  }
}
