@extends('layouts.app')


@section('content')
    <div class="container">
        <form method="post" action="{{ route('paginacion1') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="author">Por Pagina</label>
                        <select name="porPag" class="form-control">
                            <option @if ($request->porPag == '5')
                                selected
                            @endif value="5">5</option>
                            <option @if ($request->porPag == '10')
                                selected
                            @endif value="10">10</option>
                            <option @if ($request->porPag == '15')
                                selected
                            @endif value="15">15</option>
                            <option @if ($request->porPag == '20')
                                selected
                            @endif value="20">20</option>
                        </select>
                        <input type="submit" value="buscar" class="btn btn-primary">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="author">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo"
                            value="{{ isset($request->titulo) ? $request->titulo : '' }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="author">Precio</label>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <select name="signo" class="form-control col-3">

                                <option @if ($request->signo == '>=')
                                    selected
                                @endif value=">">>=</option>
                                <option @if ($request->signo == '>')
                                    selected
                                @endif value=">">></option>
                                <option @if ($request->signo == '<')
                                    selected
                                @endif value="<"><</option>
                                <option @if ($request->signo == '<=')
                                    selected
                                @endif value="<"><=</option>
                                <option @if ($request->signo == '=')
                                    selected
                                @endif value="=">=</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control col-3" id="price" name="price" placeholder="precio" min=0 step=0.01
                            value="{{ isset($request->price) ? $request->price : '0' }}">
                        </div>

                    </div>
                    <div class="form-group">
                    </div>
                </div>
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
            </div>
            <div class="row justify-content-center">
                <a href="{{ route('paginacion1') }}">borrar filtros</a>
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
