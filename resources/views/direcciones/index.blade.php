@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Gestión de Direcciones</h1>
        <hr>
    </div>
    <div class="d-flex justify-content-center">
        <a type="button" class="btn btn-primary" href="{{ route('direcciones.create') }}">Añadir</a>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
        @foreach ($direcciones as $direccion)
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $direccion->Direccion }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $direccion->Barrio }}</h6>
                    <p class="card-text">{{ $direccion->Ciudad }}</p>
                    <div class="justify-content-center d-flex">
                        <a href="{{ route('direcciones.edit', $direccion) }}" type="button" class="btn btn-warning mx-2">
                            Editar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                        <div>
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminardireccion{{ $direccion->id }}">
                                Eliminar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-x" viewBox="0 0 16 16">
                                    <path
                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    <path fill-rule="evenodd"
                                        d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="eliminardireccion{{ $direccion->id }}" tabindex="-1" 
                                aria-labelledby="eliminardireccion{{ $direccion->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminardireccion{{ $direccion->id }}
                                                Label">Confirmación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Esta seguro de que desea eliminar esta direccion?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('direcciones.destroy', $direccion) }}" method="post" class="mx-2">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    Confirmar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $direcciones->links() }}
        </div>
    </div>
@endsection
