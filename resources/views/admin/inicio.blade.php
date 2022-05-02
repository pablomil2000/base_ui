@extends('layout')

@section('header')
    @include('admin.partials.header')
@endsection

@section('content')
    <div class="contenedor">
        <h1>Inicio</h1>
        <p>Bienvenido al panel de administración</p>
        <a href="admin/posts/create" class="btn">Nuevo Post</a>
        @auth
            <a class="btn" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth

        @foreach ($posts as $post)
            <div class="post">
                <article>
                    <h2 class="titulo">{{ $post->id }}.- {{ $post->title }}</h2>
                    <a href="admin/posts/{{ $post->id }}/edit">Editar</a>
                    <a href="post/{{ $post->id }}">Ver</a>
                    <a href="admin/posts/{{ $post->id }}/delete">Borrar</a>
                </article>
            </div>
        @endforeach
        <section class="paginacion">
            {{ $posts->links() }}
        </section>

    </div>
@endsection

@section('footer')
    @include('admin.partials.footer')
@endsection
