<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cambiar{{ $item->id }}">
    Cambiar estado
</button>

<!-- Modal -->
<form action="{{ route('compras.cambiarestado', $item) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade text-black" id="cambiar{{ $item->id }}" tabindex="-1"
        aria-labelledby="cambiar{{ $item->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cambiar{{ $item->id }}Label">Selecciona el nuevo estado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select class="form-select" name="estado" id="estado">
                        @if ($item->Estado == 'Pedido Generado')
                            <option value="Pedido aceptado">Pedido aceptado</option>
                            <option value="Preparando pedido">Preparando pedido</option>
                            <option value="Pedido enviado">Pedido enviado</option>
                            <option value="Finalizado">Finalizado</option>
                        @elseif ($item->Estado == 'Pedido aceptado')
                            <option value="Preparando pedido">Preparando pedido</option>
                            <option value="Pedido enviado">Pedido enviado</option>
                            <option value="Finalizado">Finalizado</option>
                        @elseif ($item->Estado == 'Preparando pedido')
                            <option value="Pedido enviado">Pedido enviado</option>
                            <option value="Finalizado">Finalizado</option>
                        @else
                            <option value="Finalizado">Finalizado</option>
                        @endif
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                    <button type="submit" class="btn btn-primary">Cambiar estado</button>
                </div>
            </div>
        </div>
    </div>
</form>
