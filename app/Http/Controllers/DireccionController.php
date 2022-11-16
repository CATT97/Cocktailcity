<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direccion::where('User_id', '=', auth()->id())->paginate(10);
        return view('direcciones.index', compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('direcciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $direccion = new Direccion();
        $direccion->Direccion = $request->direccion;
        $direccion->Barrio = $request->barrio;
        $direccion->Ciudad = $request->ciudad;
        $direccion->User_id = auth()->id();
        $direccion->save();
        return Redirect::route('direcciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccione)
    {
        return view('direcciones.edit', compact('direccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccione)
    {
        $direccione->Direccion = $request->direccion;
        $direccione->Barrio = $request->barrio;
        $direccione->Ciudad = $request->ciudad;
        $direccione->save();
        return Redirect::route('direcciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccione)
    {
        $direccione->delete();
        return Redirect::route('direcciones.index');
    }
}
