@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('usuarios.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="TipoDocumento"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select @error('TipoDocumento') is-invalid @enderror"
                                        aria-label="Tipo de documento" id="TipoDocumento" name="TipoDocumento">
                                        <option value="CC">CC</option>
                                        <option value="CE">CE</option>
                                        <option value="NIT">NIT</option>
                                    </select>
                                </div>
                            </div>

                                <div class="row mb-3">
                                    <label for="NumeroDocumento"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Numero de documento') }}</label>

                                    <div class="col-md-6">
                                        <input id="NumeroDocumento" type="text"
                                            class="form-control @error('NumeroDocumento') is-invalid @enderror"
                                            name="NumeroDocumento" value="{{ old('NumeroDocumento') }}" required
                                            autocomplete="NumeroDocumento">

                                        @error('NumeroDocumento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="NumeroContacto"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Número de contacto') }}</label>

                                    <div class="col-md-6">
                                        <input id="NumeroContacto" type="text"
                                            class="form-control @error('NumeroContacto') is-invalid @enderror"
                                            name="NumeroContacto" value="{{ old('NumeroContacto') }}" required
                                            autocomplete="NumeroContacto">

                                        @error('NumeroContacto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Perfil"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Perfil') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select @error('Perfil') is-invalid @enderror"
                                            aria-label="Seleccione un perfil" id="Perfil" name="Perfil">
                                            <option value="Empleado">Empleado</option>
                                            <option value="Administrador">Administrador</option>
                                        </select>

                                        @error('Perfil')
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
                                            href="{{ route('usuarios.index') }}">Volver</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
