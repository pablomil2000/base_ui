@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card m-1">
                    <div class="card-header">Editar receta</div>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $recipe->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $recipe->description }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Ingredientes"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ingredientes') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients">{{ $recipe->ingredients }}</textarea>

                                    @error('ingredients')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="preparacion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('preparacion') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('preparacion') is-invalid @enderror" name="preparacion">{{ $recipe->preparacion }}</textarea>

                                    @error('preparacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tipoPlato"
                                    class="col-md-4 col-form-label text-md-end">{{ __('tipoPlato') }}</label>

                                <div class="col-md-6">
                                    <select name="tipoPlato" id="tipoPlato"
                                        class="form-control @error('tipoPlato') is-invalid @enderror" required>
                                        <option value="">Seleccione un tipo de plato</option>
                                        @foreach ($categories as $category)
                                            <option <?=$category['id'] == $recipe->category_id ? 'selected' : ''?> value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('tipoPlato')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                                        <input type="checkbox" name="delImag" id=""> <label>Delete Image</label>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#summernote').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            // focus: true // set focus to editable area after initializing summernote
        });
    </script>
@endsection