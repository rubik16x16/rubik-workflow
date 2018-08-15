<?php

namespace App\Http\Controllers\Admin\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Proyecto;
use App\Models\Herramienta;
use App\Models\ProyectoTipoHerramienta;

class TipoHerramientasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){

      return view('admin.proyectos.tipoHerramientas.create', [
        'routes' => str_replace('"', "'", json_encode([
          'index'=> route('admin.tipoHerramientas.api.index'),
          'store'=> route('admin.proyecto.tipoHerramientas.store', ['id'=> $id])
        ]))
      ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id){

      $tipoHerramientasPns= explode(':', $request->tipoHerramientas);

      foreach ($tipoHerramientasPns as $tipoHerramientaPn) {
        $tipoHerramienta= new ProyectoTipoHerramienta(Herramienta::find($tipoHerramientaPn)->toArray());
        $tipoHerramienta->proyecto_id= $id;
        $tipoHerramienta->save();
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

      $proyecto= Proyecto::find($id)->load('tipoHerramientas');

      return view('admin.proyectos.tipoHerramientas.edit', [
        'routes' => str_replace('"', "'", json_encode([
          'index'=> route('admin.tipoHerramientas.api.index'),
          'update'=> route('admin.proyecto.tipoHerramientas.update', ['id'=> $id])
        ])),
        'asignados' => str_replace('"', "'", $proyecto->tipoHerramientas->toJson())
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

      ProyectoTipoHerramienta::where('proyecto_id', $id)->delete();

      $tipoHerramientasPns= explode(':', $request->tipoHerramientas);

      foreach ($tipoHerramientasPns as $tipoHerramientaPn) {
        $tipoHerramienta= new ProyectoTipoHerramienta(Herramienta::find($tipoHerramientaPn)->toArray());
        $tipoHerramienta->proyecto_id= $id;
        $tipoHerramienta->save();
      }

      return redirect(route('admin.proyectos.index'));

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
}
