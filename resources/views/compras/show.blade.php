@extends('layouts.app')

@section('content')
<h1 class="text-center my-3">Detalles de la compra</h1>
<hr>
<div class="container card my-3">
    <table class="table table-light text-center">
        <tr>
            <th>Estado:</th>
            <td>{{ $compra->Estado }}</td>
        </tr>
        <tr>
            <th>Fecha:</th>
            <td>{{ $compra->FechaHora }}</td>

        </tr>
        <tr>
            <th colspan="2">Producto(s)</th>
        </tr>
    </table>
    <table class="table table-striped table-success w-75 mx-auto">
        <thead>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Tamaño</th>
            <th>Valor</th>
            <th>Total</th>
        </thead>
        @foreach($productoscompras as $productoscompra)
        <tr>
            @foreach($productos as $producto)
            @if($productoscompra->Producto_id == $producto->id)
            <th>{{ $producto->Nombre }}</th>
            <td>{{ $producto->Descripcion }}</td>
            @endif
            @endforeach
            <td>{{ $productoscompra->Cantidad }}</td>
            <td>{{ $productoscompra->Size }}</td>
            <td>{{ $productoscompra->PrecioCompra }}</td>
            <td>{{ $productoscompra->Cantidad * $productoscompra->PrecioCompra }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="4"></th>
            <th>Total</th>
            <td>{{ $compra->ValorTotal }}</td>
        </tr>
    </table>
</div>

@if ($compra->MedioCompra == 'Web')
    <h1 class="text-center my-3">Detalles del Domicilio</h1>
    <hr>
    <div class="my-3 text-center d-flex justify-content-center">
        <table class="card table table-light w-auto">
            <tbody>
                <tr>
                    <th>Nombre del cliente:</th>
                    <td>{{ $usuario->name }}</td>
                </tr>
                <tr>
                    <th>Celular:</th>
                    <td>{{ $usuario->NumeroContacto }}</td>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <td>{{ $usuario->email }}</td>
                </tr>
                <tr>
                    <th>Dirección:</th>
                    <td>{{ $usuario->Direccion }} {{ $usuario->Barrio }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endif
{{-- <div class="text-center">
    <button type="button" class="btn btn-primary" onclick="history.back()">Volver</button>
</div> --}}

@endsection