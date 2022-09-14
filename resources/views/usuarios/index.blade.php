@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Gestión de Usuarios</h1>
        <hr>
    </div>
    <div class="d-flex justify-content-center">
        <form action="{{ route('usuarios.index') }}" method="get" class="d-flex">
            <input type="text" class="form-control mx-3" name="busqueda" value="{{ $busqueda }}">
            <input type="submit" class="btn btn-success" value="Buscar">
        </form>
        <form action="{{ route('usuarios.index') }}" method="get" class="d-flex">
            <input type="submit" class="btn btn-secondary mx-3" value="Limpiar">
        </form>
        <a type="button" class="btn btn-primary" href="{{ route('usuarios.create') }}">Añadir</a>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
        @foreach ($usuarios as $usuario)
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <div class="float-end">
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#detallesUsuario{{ $usuario->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a>

                        <div class="modal fade" id="detallesUsuario{{ $usuario->id }}" tabindex="-1"
                            aria-labelledby="detallesUsuario{{ $usuario->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detallesUsuario{{ $usuario->id }}Label">Detalles del
                                            usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <td>{{ $usuario->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $usuario->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tipo de documento</th>
                                                    <td>{{ $usuario->TipoDocumento }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Número de documento</th>
                                                    <td>{{ $usuario->NumeroDocumento }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Número de contacto</th>
                                                    <td>{{ $usuario->NumeroContacto }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Género</th>
                                                    <td>{{ $usuario->Genero }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dirección</th>
                                                    <td>{{ $usuario->Direccion }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Barrio</th>
                                                    <td>{{ $usuario->Barrio }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ciudad</th>
                                                    <td>{{ $usuario->Ciudad }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Perfil</th>
                                                    <td>{{ $usuario->Perfil }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title">{{ $usuario->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $usuario->Perfil }}</h6>
                    <p class="card-text">{{ $usuario->email }}</p>
                    <p class="card-text">{{ $usuario->NumeroContacto }}</p>
                    <div class="justify-content-center d-flex">
                        <a href="{{ route('usuarios.edit', $usuario) }}" type="button" class="btn btn-warning mx-2">
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
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarUsuario{{ $usuario->id }}">
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
                            <div class="modal fade" id="eliminarUsuario{{ $usuario->id }}" tabindex="-1" 
                                aria-labelledby="eliminarUsuario{{ $usuario->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarUsuario{{ $usuario->id }}
                                                Label">Confirmación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Esta seguro de que desea eliminar este usuario?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="post" class="mx-2">
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
    </div>
@endsection
