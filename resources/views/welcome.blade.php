@extends('layouts.app')

@section('content')
    <div class="jumbotron m-5 banner-home">
        <img src="/images/banner.jpeg"
            alt="banner">
    </div>

    <div class="text-center display-3">
        Nuestros Productos
    </div>

    <div class="mx-5 mt-5 row justify-content-center">
        @foreach ($productos as $producto)
            <div class="card m-3 productos" style="width: 18rem;">
                <div class="card-body">
                    <form method="POST" action="{{route('cart.store', $producto)}}">
                        @csrf
                        <input type="text" name="id" class="form-control" id="id" value="{{ $producto->id }}" hidden>
                        <img src="/images/{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}" class="w-100">
                        <h5 class="card-title">{{ $producto->Nombre }}</h5>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $producto->Nombre }}" hidden>
                        <h6 class="card-text">Descripción</h6>
                        <p class="card-subtitle mb-2 text-muted px-3">{{ $producto->Descripcion }}</p>
                        <div class="form-group">
                            <label for="price">Tamaño y precio</label>
                            <select name="price" id="price" class="form-select">
                            @foreach ($precios as $precio)
                                <option value="{{ $precio->id }}">{{ $precio->Size }} onz - ${{ $precio->Precio }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">CANTIDAD</label>
                            <input type="number" min=1 max={{$producto->Stock-5}} name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" required>
                            <label class="float-end"> Disponible: {{$producto->Stock-5}}</label>

                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection