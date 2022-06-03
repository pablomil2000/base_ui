@extends('layouts.app')


@section('content')
    <div class="container">
        <form method="post" action="{{ route('paginacion2') }}?page=1">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <select name="author_id" class="form-control" onchange="submit()">
                            <option value="%">All</option>
                            @foreach ($authors as $author)
                                @isset($request->author_id)
                                    @if ($request->author_id == $author->id)
                                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                    @else
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endif
                                @else
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endisset
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="editorial">Editorial</label>
                    <select name="editorial_id" class="form-control" onchange="submit()">
                        <option value="%">All</option>
                        @foreach ($editorials as $editorial)
                            @isset($request->editorial_id)
                                @if ($request->editorial_id == $editorial->id)
                                    <option value="{{ $editorial->id }}" selected>{{ $editorial->name }}</option>
                                @else
                                    <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                                @endif
                            @else
                                <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                            @endisset
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="{{ route('paginacion2') }}?page=1">borrar filtros</a>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td>Name</td>
                        <td>Autor</td>
                        <td>Precio</td>
                        <td>Editorial</td>
                    </tr>
                    @foreach ($libros as $libro)
                        <tr>
                            <td>{{ $libro->title }}</td>
                            <td>{{ $libro->author->name }}</td>
                            <td>{{ $libro->price }} €</td>
                            <td>{{ $libro->editorial->name }}</td>
                        </tr>
                    @endforeach
                </table>
                {{ $libros->links() }}
            </div>
        </div>
    </div>
@endsection
