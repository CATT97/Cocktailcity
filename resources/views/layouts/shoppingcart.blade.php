<div class="dropdown carrito">
    <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
        aria-expanded="false" aria-controls="collapseWidthExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart-fill"
            viewBox="0 0 16 16">
            <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        {{ Cart::getTotalQuantity() }}
    </button>
    <div class="collapse collapse-horizontal" id="collapseWidthExample">
        <div class="card card-body">
            @if (!Cart::isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th sc ope="col">Accion</th>
                            <th sc ope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <th scope="row">
                                    <form method="POST" action="{{ route('cart.destroy', $item->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </th>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <th sc ope="col">Items</th>
                            <th sc ope="col">Sub total</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ Cart::getTotalQuantity() }}</th>
                            <th scope="row">{{ Cart::getSubTotal() }}</th>
                            <th scope="row">{{ Cart::getTotal() }}</th>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center">
                    <a href="{{ route('compras.index') }}" class="btn btn-success">Finalizar compra</a>
                </div>
            @else
                <h1 class="text-black">Carrito Vacio</h1>
            @endif
        </div>
    </div>

</div>
