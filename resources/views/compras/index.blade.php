@extends('layouts.app')

@section('content')
    @if (Cart::getTotal() != 0)
        <div class="text-center my-5">
            <h1>Detalles de la compra</h1>
        </div>
        <hr>
        <form method="POST" action="{{ route('compras.store') }}">
        @csrf
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
                                        @if (explode('s', $item->id)[0] == $producto->id)
                                            <img src="/images/{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}"
                                                class="w-100">
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-light fs-3">
                                    {{ $item->name }}
                                </td>
                                <td>
                                    @foreach ($productos as $producto)
                                        @if (explode('s', $item->id)[0] == $producto->id)
                                            {{ $producto->Descripcion }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{ explode('s', $item->id)[1] }} onz
                                </td>
                                <td>
                                    ${{ $item->price }}
                                </td>
                                <td>
                                    {{ $item->quantity }} uds
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
                        @if ($user->Perfil == 'Cliente')
                        <tr>
                            <th colspan="8" class="text-center fs-3">Datos de envio</th>
                        </tr>
                        <tr>
                            <th colspan="8">
                                <div>
                                    <a type="button" href="{{ route('direcciones.index') }}"
                                        class="btn btn-secondary float-end">Gestionar direcciones</a>
                                </div>
                                Selecciona una direccion
                                <div class="mx-5 mt-5 row justify-content-center">
                                    @foreach ($direcciones as $direccion)
                                        <div class="card m-3" style="width: 18rem;">
                                            <div class="card-body">
                                                <input class="form-check-input float-end" type="radio" name="direccion"
                                                    value="{{ $direccion->id }}" id="{{ $direccion->id }}" required>
                                                <h5 class="card-title">{{ $direccion->Direccion }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $direccion->Barrio }}</h6>
                                                <p class="card-text">{{ $direccion->Ciudad }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @if ($direcciones->isEmpty() && $user->Perfil == 'Cliente')
                <div class="text-center">
                    Genere una dirección para terminar la venta
                </div>
            @else
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                </div>
            @endif
        </form>
        <script>
            document.getElementsByClassName('carrito')[0].style.display = 'none';
        </script>
    @else
        <div class="text-center">
            <h1 class="my-5">Su carrito actualmente esta vacio</h1>
            <a class="btn btn-primary" href="{{ url('/') }}">Agrege productos aquí</a>
        </div>
    @endif
@endsection
