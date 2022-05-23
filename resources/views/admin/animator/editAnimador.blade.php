@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nuevo Animador') }}</div>

                    <div class="card-body">
                        <form method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $animador->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" min='500'
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ $animador->price }}" required autocomplete="price" autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="specialty_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('specialty_id') }}</label>

                                <div class="col-md-6">
                                    <select name="specialty_id" required
                                        class="form-control @error('specialty_id') is-invalid @enderror">
                                        <option value="">Seleccione una especialidad</option>
                                        @foreach ($especialidades as $especialidad)
                                            @if ($especialidad->id == $animador->specialty_id)
                                                <option value="{{ $especialidad->id }}" selected>
                                                    {{ $especialidad->name }}</option>
                                            @else
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('specialty_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
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
