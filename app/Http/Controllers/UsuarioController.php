<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Mockery\Matcher\HasKey;

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
                    ->orWhere('NumeroDocumento','LIKE','%'.$busqueda.'%')
                    ->get();
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
        $user->password = Hash::make($request->password);
        $user->TipoDocumento = $request->TipoDocumento;
        $user->NumeroDocumento = $request->NumeroDocumento;
        $user->NumeroContacto = $request->NumeroContacto;
        $user->Genero = $request->Genero;
        $user->Direccion = $request->Direccion;
        $user->Barrio = $request->Barrio;
        $user->Ciudad = $request->Ciudad;
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
        $usuario->Genero=$request->Genero;
        $usuario->NumeroContacto=$request->NumeroContacto;
        $usuario->Direccion=$request->Direccion;
        $usuario->Barrio=$request->Barrio;
        $usuario->Ciudad=$request->Ciudad;
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
        $usuario->delete();
        return Redirect::route("usuarios.index");
    }
}
