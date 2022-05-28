@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Party') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('newParty') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('titulo') }}</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror"
                                        name="titulo" value="{{ old('titulo') }}" required autofocus>

                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="descripcion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>

                                <div class="col-md-6">
                                    <input id="descripcion" type="text"
                                        class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                        value="{{ old('descripcion') }}" required autofocus>

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="asistentes" class="col-md-4 col-form-label text-md-end">{{ __('asistentes') }}</label>

                                <div class="col-md-6">
                                    <input id="asistentes" type="number" min="0" class="form-control @error('asistentes') is-invalid @enderror"
                                        name="asistentes" value="{{ old('asistentes') }}" required autofocus>

                                    @error('asistentes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('fecha') }}</label>

                                <div class="col-md-6">
                                    <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror"
                                        name="fecha" value="{{ old('fecha') }}" required autofocus>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lugar" class="col-md-4 col-form-label text-md-end">{{ __('lugar') }}</label>

                                <div class="col-md-6">
                                    <input id="lugar" type="text" class="form-control @error('lugar') is-invalid @enderror"
                                        name="lugar" value="{{ old('lugar') }}" required autofocus>

                                    @error('lugar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hora" class="col-md-4 col-form-label text-md-end">{{ __('hora') }}</label>

                                <div class="col-md-6">
                                    <input id="hora" type="time" class="form-control @error('hora') is-invalid @enderror"
                                        name="hora" value="{{ old('hora') }}" required autofocus>

                                    @error('hora')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="duracion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('duracion') }}</label>

                                <div class="col-md-6">
                                    <input id="duracion" type="text"
                                        class="form-control @error('duracion') is-invalid @enderror" name="duracion"
                                        value="{{ old('duracion') }}" required autofocus placeholder="duracion en horas">

                                    @error('duracion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Animadores"
                                    class="col-md-12 col-form-label text-md-end">{{ __('Animadores') }}</label>

                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                {{-- <th scope="col">#</th> --}}
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Especialidad</th>
                                                <th scope="col">Precio/hora</th>
                                                <th scope="col">Tiempo contratado</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($animators as $animator)
                                                <tr>
                                                    {{-- <th scope="row">{{ $animator->id }}</th> --}}
                                                    <td>{{ $animator->name }}</td>
                                                    <td>{{ $animator->Specialty->name }}</td>
                                                    <td>{{ number_format($animator->price,2) }} €</td>
                                                    <td><input class="form-control text-center" type="number" min="0"
                                                            value="0" name="animador[{{ $animator->id }}]"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('solicitar fiesta') }}
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
