<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Precio;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));
        $productos = Productos::where('Nombre', 'like', '%' . $busqueda . '%')
                    ->paginate(10);
        $precioSizes = Precio::where('Activo', '=', TRUE)->get();
        return view('productos.index', compact('productos','busqueda','precioSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Productos();
        $producto->Nombre = $request->name;
        $producto->Descripcion = $request->descripcion;
        $producto->Stock = $request->stock;
        $request->validate([
            'imagen' => 'image|max:2048'
        ]);
        $producto->Imagen = $request->imagen->store('productos', 'images');
        $producto->Activo = TRUE;
        $producto->save();
        return Redirect::route("productos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $producto)
    {
        $producto->Nombre = $request->name;
        $producto->Descripcion = $request->descripcion;
        if($request->imagen){
            $request->validate([
                'imagen' => 'image|max:2048'
            ]);
            $producto->Imagen = $request->imagen->store('productos', 'images');
        };
        $producto->save();
        return Redirect::route("productos.index");
    }

    public function agregarInventario(Request $request, Productos $producto){
        $producto->Stock = $producto->Stock + $request->stock;
        $producto->save();
        return Redirect::route("productos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }

    public function ventas(Request $request){
        $filtro = trim($request->get('filtro'));
        $ventas = Compra::where('Estado', 'like', '%' . $filtro . '%')
                    ->paginate(10);
        return view('compras.ventas',compact('ventas', 'filtro'));
    }

    public function cambiarestado(Request $request, Compra $item){
        $item->Estado =  $request->estado;
        $item->save();
        return Redirect::route("compras.ventas");
    }
}
