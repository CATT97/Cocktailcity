<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));
        $usuarios = User::where('name', 'like', '%' . $busqueda . '%')
                    ->where('id', '>', 1)
                    ->where('Activo', '=', TRUE)
                    ->orWhere('NumeroDocumento','LIKE','%'.$busqueda.'%')
                    ->where('id', '>', 1)
                    ->where('Activo', '=', TRUE)
                    ->paginate(10);
        return view('usuarios.index', compact('usuarios','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $user->password = Hash::make($request->password);
        $user->TipoDocumento = $request->TipoDocumento;
        $user->NumeroDocumento = $request->NumeroDocumento;
        $user->NumeroContacto = $request->NumeroContacto;
        $user->Perfil = $request->Perfil;
        $user->save();
        return Redirect::route("usuarios.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->TipoDocumento=$request->TipoDocumento;
        $usuario->NumeroDocumento=$request->NumeroDocumento;
        $usuario->NumeroContacto=$request->NumeroContacto;
        $usuario->save();
        return Redirect::route("usuarios.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->Activo = FALSE;
        $usuario->save();
        return Redirect::route("usuarios.index");
    }
}
