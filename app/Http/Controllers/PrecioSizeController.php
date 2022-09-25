<?php

namespace App\Http\Controllers;

use App\Models\PrecioSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PrecioSizeController extends Controller
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
    public function create()
    {
        return view('precioSize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $precioSize = new PrecioSize();
        $precioSize->Size = $request->size;
        $precioSize->Precio = $request->precio;
        $precioSize->Activo = TRUE;
        $precioSize->save();
        return Redirect::route("productos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrecioSize  $precioSize
     * @return \Illuminate\Http\Response
     */
    public function show(PrecioSize $precioSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrecioSize  $precioSize
     * @return \Illuminate\Http\Response
     */
    public function edit(PrecioSize $precioSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrecioSize  $precioSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrecioSize $precioSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrecioSize  $precioSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrecioSize $precioSize)
    {
        //
    }
}
