@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1>Gestión de Ventas</h1>
    <hr>
</div>
<div class="d-flex justify-content-center">
    <form action="{{ route('compras.ventas') }}" method="get" class="d-flex">
        <label for="filtro" class="col-form-label fs-5">Filtro</label>
        <select class="form-select mx-3" name="filtro" id="filtro">
            <option value="">Todos</option>
            <option value="Pedido Generado">Pedido Generado</option>
            <option value="Pedido aceptado">Pedido aceptado</option>
            <option value="Preparando pedido">Preparando pedido</option>
            <option value="Pedido enviado">Pedido enviado</option>
            <option value="Finalizado">Finalizado</option>
        </select>
        <input type="submit" class="btn btn-success" value="Filtrar">
    </form>
</div>
<div class="text-center my-5">
    @if ($filtro == '')
    <h2>Mostrando todas las ventas</h2>
    @else
    <h2>Filtrando ventas por: {{ $filtro }}</h2>
    @endif

</div>

<hr>

<table class="container table table-dark table-hover text-center">
    <thead class="table-light">
        <tr>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Valor</th>
            <th>medio</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $item)
            <tr>
                <td>{{ $item->FechaHora}}</td>
                <td>{{ $item->Estado }}</td>
                <td>{{ $item->ValorTotal }}</td>
                <td>{{ $item->MedioCompra }}</td>
                <td><a href="{{ route('compras.show', $item) }}" class="btn btn-warning">Ver Detalles</a>
                @if ($item->Estado != 'Finalizado')
                    @include('compras.estadosventas')
                @endif
             </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $ventas->links() }}
</div>


<script>

</script>
@endsection