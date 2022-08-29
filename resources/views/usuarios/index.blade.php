@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Gestión de Usuarios</h1>
        <a type="button" class="btn btn-primary" href="{{ route('usuarios.create') }}">Añadir</a>
    </div>
    <div class="mx-5 mt-5 row justify-content-center">
    @foreach ($usuarios as $usuario)
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $usuario->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $usuario->Perfil}}</h6>
                <p class="card-text">{{ $usuario->email}}</p>
                <p class="card-text">{{ $usuario->NumeroContacto}}</p>
                <a href="{{route('usuarios.edit',$usuario)}}" class="card-link">Editar</a>
                <form action="{{route('usuarios.destroy', $usuario)}}" method="post" style="display: contents;">
                    @method("DELETE")
                    @csrf
                    <a type="submit" class="card-link">Eliminar</a>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
