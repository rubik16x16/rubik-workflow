<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Usuario;
use App\Models\Rol;
use App\Models\UsuarioRol;

class UsuariosController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    return view('admin.usuarios.index', [
      'usuarios' => str_replace('"', "'", Usuario::all()->load('roles')->toJson()),
      'routes' => str_replace('"', "'", json_encode([
        'edit' => route('admin.usuarios.edit', ['id']),
        'destroy' => route('admin.usuarios.destroy', ['id']),
        'create' => route('admin.usuarios.create')
        ]))
    ]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){

    return view('admin.usuarios.create', [
      'roles' => Rol::all()
    ]);

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

			foreach($request->all() as $clave => $valor){
				if(substr($clave, 0, 3) == 'rol'){
					UsuarioRol::create([
						'usuario_id' => $usuario->id,
						'rol_id' => $valor
					]);
				}
			}

      return redirect(route('admin.usuarios.index'));

    }

    return redirect(route('admin.usuarios.create'));
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

    $usuario= Usuario::find($id)->load('roles');
    $roles= Rol::all();

    foreach($roles as $rol){
      if($usuario->roles->contains($rol)){
        $rol->checked= true;
      }
    }

    return view('admin.usuarios.edit',[
      'usuario' => $usuario,
      'roles' => $roles
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

    $usuario= Usuario::find($id)->load('roles');
    $usuario->email= $request->email;
    $usuario->clave= password_hash($request->clave, PASSWORD_DEFAULT);
    $usuario->save();

    UsuarioRol::where('usuario_id', $id)->delete();

		foreach($request->all() as $clave => $valor){
			if(substr($clave, 0, 3) == 'rol'){
				UsuarioRol::create([
					'usuario_id' => $usuario->id,
					'rol_id' => $valor
				]);
			}
		}

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
