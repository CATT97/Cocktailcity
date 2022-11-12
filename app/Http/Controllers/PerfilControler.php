<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PerfilControler extends Controller
{
    public function update(Request $request, User $usuario)
    {
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->TipoDocumento=$request->TipoDocumento;
        $usuario->NumeroDocumento=$request->NumeroDocumento;
        $usuario->NumeroContacto=$request->NumeroContacto;
        $usuario->save();
        return Redirect::route('perfil', compact('usuario'));
    }
}
