<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\CompraUsuario;
use Illuminate\Http\Request;

class CompraUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::where('User_id', '=', auth()->id())->paginate('10');
        return view('comprausuario.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompraUsuario  $compraUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(CompraUsuario $compraUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompraUsuario  $compraUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(CompraUsuario $compraUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompraUsuario  $compraUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompraUsuario $compraUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompraUsuario  $compraUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompraUsuario $compraUsuario)
    {
        //
    }
}
