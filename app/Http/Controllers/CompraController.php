<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Direccion;
use App\Models\Productos;
use App\Models\ProductosCompra;
use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

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
        $this->middleware('perfil');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        $direcciones = Direccion::where('User_id', '=', auth()->id())->paginate(3);
        $user = User::find(auth()->id());
        return view('compras.index', compact('productos', 'direcciones', 'user'));
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
        $compra = new Compra();
        $compra->FechaHora = now();
        $compra->ValorTotal = CartFacade::getTotal();
        $compra->User_id = auth()->id();
        if (User::find(auth()->id())->Perfil == 'Cliente') {
            $compra->Estado = 'Pedido Generado';
            $compra->MedioCompra = 'Web';
            $compra->Direccion_id = $request->direccion;
        }else{
            $compra->Estado = 'Finalizado';
            $compra->MedioCompra = 'Local';
        }
        $compra->save();
        $idCompra = Compra::where('User_id', '=', auth()->id())
        ->latest('id')->first()->id;
        foreach (CartFacade::getContent() as $item) {
            $productos = new ProductosCompra();
            $productos->Compra_id = $idCompra;
            $productos->Producto_id = explode('s',$item->id)[0];
            $productos->Cantidad = $item->quantity;
            $productos->Size = explode('s',$item->id)[1];
            $productos->PrecioCompra = $item->price;
            $productos->save();
        }
        CartFacade::clear();
        return Redirect::route("compras.show", Compra::find($idCompra));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        $usuario = User::find($compra->User_id);
        $productoscompras = ProductosCompra::where('Compra_id', '=', $compra->id)->get();
        $productos = Productos::all();
        $direccion = Direccion::find($compra->Direccion_id);
        return view('compras.show', compact('compra', 'productoscompras', 'productos', 'usuario', 'direccion'));
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
