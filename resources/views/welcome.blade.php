@extends('layouts.app')

@section('content')
    <div class="jumbotron m-5 banner-home">
        <img src="https://thumbs.dreamstime.com/b/conjunto-de-varios-c%C3%B3cteles-con-fondo-negro-variados-agitador-sobre-188649840.jpg"
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
                            <select name="price" id="price">
                            @foreach ($precios as $precio)
                                <option value="{{ $precio->id }}">{{ $precio->Size }} onz - {{ $precio->Precio }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">CANTIDAD</label>
                            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" required>

                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
