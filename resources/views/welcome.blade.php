@extends('layouts.app')

@section('content')
        <div class="jumbotron m-5 banner-home">
            <img src="https://thumbs.dreamstime.com/b/conjunto-de-varios-c%C3%B3cteles-con-fondo-negro-variados-agitador-sobre-188649840.jpg" alt="banner">
        </div>

        <div class="text-center display-3">
            Nuestros Productos
        </div>

        <div class="mx-5 mt-5 row justify-content-center">
            @foreach ($productos as $producto)
                <div class="card m-3 productos" style="width: 18rem;">
                    <div class="card-body">
                        <img src="/images/{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}" class="w-100">
                        <h5 class="card-title">{{ $producto->Nombre }}</h5>
                        <h6 class="card-text">Descripción</h6>
                        <p class="card-subtitle mb-2 text-muted px-3">{{ $producto->Descripcion }}</p>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
