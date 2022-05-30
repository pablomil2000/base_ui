@extends('layouts.app')

@section('content')

@include('/partials/flash')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis recetas</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($recipes) == 0)
                                    <tr>
                                        <td colspan="3">Aun no tienes recetas.</td>
                                    </tr>
                                @endif
                                @foreach($recipes as $recipe)
                                    <tr>
                                        <td>{{ $recipe->name }}</td>
                                        <td>{{ Str::limit($recipe->description), 10 }}</td>
                                        <td>
                                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-success">Ver</a>
                                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-warning">Editar</a>
                                            <a href="{{ route('recipes.delete', $recipe->id) }}" class="btn btn-danger">Eliminar</a>
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