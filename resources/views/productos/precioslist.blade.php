<div class="botonPrecioSize">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productoSize">Tamaños y
            precios</button>
    </div>
    <!-- Modal -->
    <div class="modal fade text-dark" id="productoSize" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="productoSizeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productoSizeLabel">Tamaños y precios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tamaño</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($precioSizes as $precioSize)
                        <tr>
                            <td>{{ $precioSize->Size }}</td>
                            <td>{{ $precioSize->Precio }}</td>
                            <td><a href="{{ route('precios-y-tamanos.edit', $precioSize) }}" type="button" class="btn btn-warning mx-2">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-primary" href="{{ route('precios-y-tamanos.create') }}">Añadir</a>
            </div>
        </div>
    </div>