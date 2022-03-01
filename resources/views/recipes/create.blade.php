@extends('layouts.app')

@section('botones')
    <a href="/recipes/create"><button type="button" class="btn btn-warning">Crear Receta</button></a>
    <a href=""><button type="button" class="btn btn-info">Ver perfil</button></a>
@endsection

@push('css')
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
@endpush

@push('script')
    <!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Gestiona mis recetas</h1>
                <form method="POST" enctype=multipart/form-data>
                    @csrf
                    {{-- Titulo --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Titulo receta') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Categorias --}}
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- preparacion --}}
                    <div class="row mb-3">
                        <label for="prepa" class="col-md-4 col-form-label text-md-end">{{ __('Preparacion') }}</label>

                        <div class="col-md-6">
                            <textarea name="prepa" class="textarea @error('prepa') is-invalid @enderror" cols="60" rows="3"
                                placeholder="Preparacion"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('full_text') }}</textarea>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Ingredientes --}}
                    <div class="row mb-3">
                        <label for="ingre" class="col-md-4 col-form-label text-md-end">{{ __('ingredientes') }}</label>

                        <div class="col-md-6">
                            <textarea name="ingre" class="textarea @error('ingre') is-invalid @enderror" cols="60" rows="3"
                                placeholder="Ingredientes"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('ingre') }}</textarea>
                        </div>
                    </div>

                    {{-- Imagen --}}
                    <div class="row mb-3">
                        <label for="img" class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" value="{{ old('image') }}" required autocomplete="image">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear Receta') }}
                                </button>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection
