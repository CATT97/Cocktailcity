@extends('layouts.app')

@section('content')
    <div class="text-center my-5">
        <h1>Detalles de la compra</h1>
    </div>
    <hr>
    <div class="container my-5">
    <table class="table text-light">
        <thead class="text-center">
            <th colspan="2">Producto</th>
            <th colspan="4">Descripción</th>
            <th>Valor</th>
        </thead>
        <tbody>
            @foreach (Cart::getContent() as $item)
                <tr>
                    <td class="imagen-compra">
                        @foreach ($productos as $producto)
                            @if ($item->idproducto == $producto->id)
                                <img src="/images/{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}" class="w-100">
                            @endif
                        @endforeach
                    </td>
                    <td class="text-light fs-3">
                        {{ $item->name }}
                    </td>
                    <td>
                        @foreach ($productos as $producto)
                            @if ($item->idproducto == $producto->id)
                                {{ $producto->Descripcion }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        {{ $item->size }} onz
                    </td>
                    <td>
                        ${{ $item->price }}
                    </td>
                    <td>
                        {{ $item->quantity }}
                    </td>
                    <td>
                        {{ $item->price * $item->quantity }}
                    </td>
                </tr>
            @endforeach
                <tr>
                    <th colspan="6" class="text-end">TOTAL</th>
                    <td>{{ Cart::getTotal() }}</td>
                </tr>
                <tr>
                    <th colspan="8" class="text-center fs-3">Datos de envio</th>
                </tr>
        </tbody>
    </table>    
    </div>
    <div class="text-center">
        <a href="{{ route('compras.create') }}" class="btn btn-primary">Finalizar Compra</a>
    </div>
    <script>
        document.getElementsByClassName('carrito')[0].style.display = 'none';
    </script>
@endsection