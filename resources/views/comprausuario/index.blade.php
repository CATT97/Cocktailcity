@extends('layouts.app')

@section('content')

<h1 class="text-center">Lista de compras</h1>
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
        @foreach ($compras as $item)
            <tr>
                <td>{{ $item->FechaHora}}</td>
                <td>{{ $item->Estado }}</td>
                <td>{{ $item->ValorTotal }}</td>
                <td>{{ $item->MedioCompra }}</td>
                <td><a href="{{ route('compras.show', $item) }}" class="btn btn-warning">Ver Detalles</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection