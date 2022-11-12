@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perfil') }}</div>

                <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TipoDocumento" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>

                            <div class="col-md-6">
                                <input id="tipoDocumento" type="tipoDocumento" class="form-control" name="tipoDocumento" value="{{ $usuario->TipoDocumento }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NumeroDocumento" class="col-md-4 col-form-label text-md-end">{{ __('Numero de documento') }}</label>

                            <div class="col-md-6">
                                <input id="NumeroDocumento" type="text" class="form-control" name="NumeroDocumento" value="{{ $usuario->NumeroDocumento }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="NumeroContacto" class="col-md-4 col-form-label text-md-end">{{ __('Número de contacto') }}</label>

                            <div class="col-md-6">
                                <input id="NumeroContacto" type="text" class="form-control" name="NumeroContacto" value="{{ $usuario->NumeroContacto }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a type="button" class="btn btn-primary" href="{{ url('/perfil/editar', Auth::user()) }}">
                                    {{ __('Editar') }}
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
