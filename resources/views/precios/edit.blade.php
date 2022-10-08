@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar precios') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('precios.update', $precio) }}">
                        @method('PUT') 
                        @csrf

                        <div class="row mb-3">
                            <label for="size" class="col-md-4 col-form-label text-md-end">{{ __('Tamaño') }}</label>

                            <div class="col-md-6">
                                <input id="size" type="number"
                                    class="form-control @error('size') is-invalid @enderror" name="size"
                                    value="{{ $precio->Size }}" required disabled>

                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio"
                                class="col-md-4 col-form-label text-md-end">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number"
                                    class="form-control @error('precio') is-invalid @enderror" name="precio"
                                    value="{{ $precio->Precio }}" autofocus required autocomplete="precio">

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                <a type="button" class="btn btn-secondary" href="{{ route('productos.index') }}">Volver</a>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
