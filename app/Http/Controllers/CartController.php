<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Models\Productos;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        $precios = Precio::all();
        return view('welcome',compact('productos','precios'));
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
    // public function store(Productos $producto)
    // {
    //     Cart::add(array(
    //         'id' => $producto->id, 
    //         'name' => $producto->Nombre,
    //         'price' => 20.20,
    //     ));
    //     return back();
    // }

    public function store(Request $request, Productos $producto)
{
    $precios = Precio::find($request->price);
    
    Cart::add(array(
        'id' => $request->id.'s'.$precios->Size,
        'name' => $request->name,
        'price' => $precios->Precio,
        'quantity' => $request->quantity,
    ));
    return back();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart)
    {
        Cart::remove($cart);
        return back();
    }
}
