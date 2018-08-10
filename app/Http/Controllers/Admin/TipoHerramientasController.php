<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoHerramientasController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return view('admin.tipoHerramientas.index', [
      'routes' => str_replace('"', "'", json_encode([
        'index'=> route('admin.tipoHerramientas.api.index')
      ]))
    ]);

  }

}
