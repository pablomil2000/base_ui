@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">{{ $post->title }}</h2>
                <p class="fecha">{{ $post->created_at }}</p>
                <div class="imagen">
                    <img src="/imagenes/{{ $post->img }}" alt="">                        
                </div>
                <p class="intro">
                    {{ $post->body }}
                </p>
                <a href="/home" class="continuar">Volver</a>
        </article>
    </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
