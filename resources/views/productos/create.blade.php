@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar producto') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="imagen" class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>

                                <div class="col-md-6">
                                    <input id="imagen" type="file"
                                        class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                                        accept="image/*" onchange="mostrarImagen()" required>

                                    <img src="" alt="archivoSeleccionado" id="archivoSeleccionado"
                                        onerror="this.style.display = 'none'" class="mw-100 my-3">

                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="descripcion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    <input id="descripcion" type="text"
                                        class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                        value="{{ old('descripcion') }}" required>

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stock"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                                <div class="col-md-6">
                                    <input id="stock" type="text"
                                        class="form-control @error('stock') is-invalid @enderror" name="stock"
                                        value="{{ old('stock') }}" required>

                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar producto') }}
                                    </button>

                                    <a type="button" class="btn btn-secondary"
                                        href="{{ route('productos.index') }}">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarImagen() {
            let srcImagen = document.getElementById('imagen');
            let url = URL.createObjectURL(srcImagen.files[0]);
            let verimagen = document.getElementById('archivoSeleccionado');
            verimagen.src = url;
            verimagen.removeAttribute('style');
        }
    </script>
@endsection
