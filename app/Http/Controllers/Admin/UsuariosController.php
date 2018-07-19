<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;

class UsuariosController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    return view('admin.usuarios.index', [
      'usuarios' => Usuario::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
    return view('admin.usuarios.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){

    $usuario= Usuario::where('email', $request->email)->first();

    if($usuario == null){

      $usuario= new Usuario();
      $usuario->email= $request->email;
      $usuario->clave= password_hash($request->clave, PASSWORD_DEFAULT);
      $usuario->save();

      return redirect(route('admin.usuarios.index'));

    }

    $request->session()->flash('error', 'Usuario ya registrado');
    $request->session()->flash('email', $request->get('email'));

    return redirect(route('admin.usuario.create'));
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
    return view('admin.usuarios.edit',[
      'usuario' => Usuario::find($id)
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

    $usuario= Usuario::find($id);
    $usuario->email= $request->email;
    $usuario->clave= password_hash($request->clave, PASSWORD_DEFAULT);
    $usuario->save();

    return redirect(route('admin.usuarios.index'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){

    $usuario= Usuario::find($id);
    $usuario->delete();
    
  }
}
