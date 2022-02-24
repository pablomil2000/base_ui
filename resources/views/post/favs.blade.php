@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- @dd($posts) --}}
                @foreach ($posts as $post)
                    <a href="/post/{{ $post->id}}">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="row">
                                    <img height="300" src="image\post\{{ $post->url }}" alt="">
                                </div>
                                {{-- <p>Publicado: {{ $post->created_at->diffForHumans() }}</p> --}}
                                {{-- <p>Descripcion: {{ $post->description }}</p> --}}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
