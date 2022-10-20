@extends('layouts.app')

@section('content')

    <div class="container card">
        <table class="table table-light text-center">
            <tr>
                <th>Estado:</th>
                <td>{{ $compra->Estado }}</td>

            </tr>
            <tr>
                <th>Fecha:</th>
                <td>{{ $compra->FechaHora }}</td>
                
            </tr>
            <tr>
                <th colspan="2">Producto(s)</th>
            </tr>
        </table>
    </div>    

@endsection