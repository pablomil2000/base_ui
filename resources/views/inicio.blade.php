@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="contenedor">
        @foreach ($posts as $post)
            <div class="post">
                <article>
                    <h2 class="titulo">{{ $post->title }}</h2>
                    <p class="fecha">{{ $post->created_at }}</p>
                    <div class="imagen">
                        @if($post::getImageAttribute($post->img))
                            <img src="{{ $post->img }}" alt="">
                        @else
                        <img src="{{ 'imagenes/'.$post->img }}" alt="">
                        @endif
                        {{-- <img src="{{ $post->img }}" alt=""> --}}
                    </div>
                    <p class="intro">
                        {{ $post->intro }}
                    </p>
                    <a href="post/{{ $post->id }}" class="continuar">Continuar Leyendo</a>
                </article>
            </div>
        @endforeach

    </div>
    <section class="paginacion">
        {{ $posts->links() }}
    </section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
