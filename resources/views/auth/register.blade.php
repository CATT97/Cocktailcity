@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TipoDocumento" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('TipoDocumento') is-invalid @enderror" aria-label="Tipo de documento" id="TipoDocumento" name="TipoDocumento">
                                    <option value="CC">CC</option>
                                    <option value="CE">CE</option>
                                    <option value="NIT">NIT</option>
                                </select>

                                @error('TipoDocumento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NumeroDocumento" class="col-md-4 col-form-label text-md-end">{{ __('Numero de documento') }}</label>

                            <div class="col-md-6">
                                <input id="NumeroDocumento" type="text" class="form-control @error('NumeroDocumento') is-invalid @enderror" name="NumeroDocumento" value="{{ old('NumeroDocumento') }}" required autocomplete="NumeroDocumento">

                                @error('NumeroDocumento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NumeroContacto" class="col-md-4 col-form-label text-md-end">{{ __('Número de contacto') }}</label>

                            <div class="col-md-6">
                                <input id="NumeroContacto" type="text" class="form-control @error('NumeroContacto') is-invalid @enderror" name="NumeroContacto" value="{{ old('NumeroContacto') }}" required autocomplete="NumeroContacto">

                                @error('NumeroContacto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Genero" class="col-md-4 col-form-label text-md-end">{{ __('Género') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('Genero') is-invalid @enderror@error('Genero') is-invalid @enderror" aria-label="Seleccione su genero" id="Genero" name="Genero">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="No-binario">No-binario</option>
                                </select>

                                @error('Genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Direccion" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="text" class="form-control @error('Direccion') is-invalid @enderror" name="Direccion" value="{{ old('Direccion') }}" required autocomplete="Direccion">

                                @error('Direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Barrio" class="col-md-4 col-form-label text-md-end">{{ __('Barrio') }}</label>

                            <div class="col-md-6">
                                <input id="Barrio" type="text" class="form-control @error('Barrio') is-invalid @enderror" name="Barrio" value="{{ old('Barrio') }}" required autocomplete="Barrio">

                                @error('Barrio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Ciudad" class="col-md-4 col-form-label text-md-end">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <select class="form-select @error('Ciudad') is-invalid @enderror" aria-label="Seleccione su Ciudad" id="Ciudad" name="Ciudad">
                                    <option value="Manizales">Manizales</option>
                                    <option value="Villamaria">Villamaria</option>
                                </select>

                                @error('Ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
