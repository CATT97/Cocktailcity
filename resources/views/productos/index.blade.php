@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Gestión de Productos</h1>
        <hr>
    </div>
    <div class="d-flex justify-content-center">
        <form action="{{ route('productos.index') }}" method="get" class="d-flex">
            <label for="busqueda" class="col-form-label fs-5">Filtro</label>
            <input type="text" class="form-control mx-3" name="busqueda" value="{{ $busqueda }}" placeholder="Nombre">
            <input type="submit" class="btn btn-success" value="Buscar">
        </form>
        <form action="{{ route('productos.index') }}" method="get" class="d-flex">
            <input type="submit" class="btn btn-secondary mx-3" value="Limpiar">
        </form>
        <a type="button" class="btn btn-primary" href="{{ route('productos.create') }}">Añadir</a>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
        @foreach ($productos as $producto)
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <div class="float-end">
                        <a href="{{ route('productos.edit', $producto) }}" type="button"
                            class="btn btn-warning texto-oculto">
                            <p>Editar</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg>
                        </a>
                    </div>
                    <img src="/images/{{ $producto->Imagen }}" alt="{{ $producto->Nombre }}" class="w-100">
                    <h5 class="card-title">{{ $producto->Nombre }}</h5>
                    <h6 class="card-text">Descripción</h6>
                    <p class="card-subtitle mb-2 text-muted px-3">{{ $producto->Descripcion }}</p>
                    <h6 class="card-text">Stock</h6>
                    <p class="card-subtitle mb-2 text-muted px-3">{{ $producto->Stock }}</p>
                    <div class="float-end">
                        <a type="button" class="btn btn-primary texto-oculto" data-bs-toggle="modal"
                            data-bs-target="#sumarinventario{{ $producto->id }}">
                            <p>Añadir Stock</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="sumarinventario{{ $producto->id }}" tabindex="-1"
                            aria-labelledby="sumarinventario{{ $producto->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sumarinventario{{ $producto->id }}Label">Añadir Stock
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('productos.agregarInventario', $producto) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="stock"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                                                <div class="col-md-6">
                                                    <input id="stock" type="text"
                                                        class="form-control @error('stock') is-invalid @enderror"
                                                        name="stock" value="{{ old('stock') }}" required>

                                                    @error('stock')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Añadir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $productos->links() }}
        </div>
    </div>
    @include('productos.precioslist')
</div>
@endsection
