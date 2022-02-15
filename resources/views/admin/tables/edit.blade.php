@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Table') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/table/'.$table->id.'/edit') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="numMes"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Numero de mesa') }}</label>

                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                                        name="id" value="{{ $table->numMes }}" required autocomplete="id" autofocus>

                                    @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="color" class="col-md-4 col-form-label text-md-end">{{ __('Color') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="color" class="form-control @error('color') is-invalid @enderror"
                                        name="color" value="{{ $table->color }}" autocomplete="color" autofocus>

                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Camarero') }}</label>

                                <div class="col-md-6">

                                    <select name="camarero" id="camarero" required
                                        class="form-control @error('camarero') is-invalid @enderror">
                                        <option value="0"> Sin Camarero </option>
                                        @foreach ($camareros as $camarero)
                                            <option value="{{ $camarero->id }}">{{ $camarero->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('Salario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="desc"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('Usuario') is-invalid @enderror" name="description"
                                        id="description" cols="30" rows="5"></textarea>

                                    @error('Usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ Route('admin.tables') }}"class="btn btn-second">
                                        {{ __('Volver') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar mesa') }}
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
