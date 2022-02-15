@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Create Table') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.create.table') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="numMes"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Numero de mesa') }}</label>

                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                                        name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>

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
                                        name="color" value="{{ old('color') }}" autocomplete="color" autofocus>

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
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear usuario') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{ __('Table List') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Camarero</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tables as $table)
                                    <tr>
                                        <th scope="col">{{ $table->numMes }}</th>
                                        <td><input type="color" disabled value="{{ $table->color }}"></td>
                                        <td>{{ $table->description }}</td>
                                        <td>
                                            @if($table->user_id != 0)
                                                {{ $table->User->name }}
                                            @else
                                                Sin camarero
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/table/' . $table->id . '/edit') }}"><button
                                                    type="button" class="btn btn-outline-warning btn-sm">Editar</button></a>
                                            <a href="{{ url('/admin/table/' . $table->id . '/delete') }}"><button
                                                    type="button"
                                                    class="btn btn-outline-danger btn-sm">Eliminar</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
