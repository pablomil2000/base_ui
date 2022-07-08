@extends('layouts.layout')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <section class="clases mt-5 py-5">
        <h2 class="separador text-center mb-3">Editar Cursos</h2>
        <div class="container">
            <form action="" method="post">
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset($cursos->UrlImage) }}" class="card-img-top">
                            <input type="file" name="image" class="form-control">
                            <input type="hidden" name="id" value="{{ $cursos->id }}">
                            <div class="card-meta bg-primary p-2 text-light">
                                <p class="text-center m-0" style="color: black"><b>
                                        <input type="text" class="form-control" value="{{ $cursos->name }}" name="name"></b>
                                    <span class="badge badge-secondary px-2 py-2">
                                        <input type="number" min="0" value="{{ $cursos->precio }}" name="precio">
                                        €</span>
                                    <br>
                                        @csrf
                                    <select required="required" name="estado">
                                        <option value="">Elije un estado</option>
                                        <option <?= $cursos->estado == '0' ? "selected" : ''?> value="0">Proximamente</option>
                                        <option <?= $cursos->estado == '1' ? "selected" : ''?> value="1">Disponible</option>
                                        <option <?= $cursos->estado == '2' ? "selected" : ''?> value="2">Cancelado</option>
                                        <option <?= $cursos->estado == '3' ? "selected" : ''?> value="3">Finalizado</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <textarea style="width:100%; height: 50%;" class="card-subtitle mb-2" name="description_L">{{ $cursos->description_L }}</textarea>
                        <textarea style="width:100%; height: 50%;" class="card-subtitle mb-2" name="description_C">{{ $cursos->description_C }}</textarea>
                    </div>
                    {{-- @endforeach --}}

                    <nav aria-label="Page navigation example">
                        {{-- <a href="{{  }} "class="alert alert-danger">Volver</a> --}}
                    </nav>

                </div>
                <input type="submit" value="Guardar" class="btn btn-primary">
            </form>

        </div>
    </section>
@endsection
