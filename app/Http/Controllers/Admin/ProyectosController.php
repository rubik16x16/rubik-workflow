<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;

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
        'create' => route('admin.proyectos.create')
        ]))
		]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

		return view('admin.proyectos.create');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

		Proyecto::create($request->all());
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

		return view('admin.proyectos.edit', [
			'proyecto' => Proyecto::find($id)
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
}
