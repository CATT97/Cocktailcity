<div class="float-end">
    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detallesUsuario{{ $usuario->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </a>

    <div class="modal fade" id="detallesUsuario{{ $usuario->id }}" tabindex="-1" aria-labelledby="detallesUsuario{{ $usuario->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detallesUsuario{{ $usuario->id }}Label">Detalles del
                        usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>