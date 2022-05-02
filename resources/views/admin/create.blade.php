@extends('layout')

@section('header')
    @include('admin.partials.header')
@endsection

@section('content')
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Crear articulo</h2>
            <form class="formulario" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="titulo" placeholder="Primer articulo">
                <input type="text" name="intro"
                placeholder="Lorem fistrum amatomaa apetecan ese que llega jarl ese que llega diodenoo no puedor caballo blanco caballo negroorl. Que?">
                <textarea name="texto"></textarea>
                <input type="file" name="imagen">
                <input type="submit" value="Modificar Articulo">
            </form>
        </article>
    </div>
</div>
@endsection

