@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear dirección') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('direcciones.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="direccion" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="barrio"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Barrio') }}</label>

                                <div class="col-md-6">
                                    <input id="barrio" type="text"
                                        class="form-control @error('barrio') is-invalid @enderror" name="barrio"
                                        value="{{ old('barrio') }}" required autocomplete="barrio">

                                    @error('barrio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ciudad"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ciudad') }}</label>

                                <div class="col-md-6">
                                    <input id="ciudad" type="text"
                                        class="form-control @error('ciudad') is-invalid @enderror" name="ciudad"
                                        required autocomplete="ciudad">

                                    @error('ciudad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar') }}
                                        </button>
                                        <a type="button" class="btn btn-secondary"
                                            href="{{ route('direcciones.index') }}">Volver</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
