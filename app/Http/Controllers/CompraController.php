<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Productos;
use App\Models\ProductosCompra;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
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
        $productos = Productos::all();
        return view('compras.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compra = new Compra();
        $compra->FechaHora = now();
        $compra->ValorTotal = CartFacade::getTotal();
        $compra->User_id = auth()->id();
        if (User::find(auth()->id())->Perfil == 'Cliente') {
            $compra->Estado = 'Pedido Generado';
            $compra->MedioCompra = 'Web';
        }else{
            $compra->Estado = 'Finalizado';
            $compra->MedioCompra = 'Local';
        }
        $compra->save();
        $idCompra = Compra::latest('id')->first()->id;
        foreach (CartFacade::getContent() as $item) {
            $productos = new ProductosCompra();
            $productos->Compra_id = $idCompra;
            $productos->Producto_id = $item->idproducto;
            $productos->Cantidad = $item->quantity;
            $productos->Size = $item->size;
            $productos->PrecioCompra = $item->price;
            $productos->save();
        }
        CartFacade::clear();
        return Redirect::route("compras.show", Compra::find($idCompra));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
