@extends('layouts.app')

@section('botones')
    <a href="/recipes/create"><button type="button" class="btn btn-warning">Crear Receta</button></a>
    <a href=""><button type="button" class="btn btn-info">Ver perfil</button></a>
@endsection

@section('content')

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Gestiona mis recetas</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>{{ $recipe->title }}</td>
                                <td>{{ $recipe->Category->name }}</td>
                                <td>
                                    <a href="/recipes/{{ $recipe->id }}">Ver</a>
                                    <a href="/recipes/{{ $recipe->id }}/edit">Editar</a>
                                    <a href="/recipes/{{ $recipe->id }}/delete">Borrar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>

@endsection
