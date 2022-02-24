@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Mi perfil</div>
        <div class="card-body">
            <div class="row">
                {{-- @dd($user) --}}
                <div class="col-4"><img src="{{ asset('image/users/'.$user->image)}}" alt=""></div>
                <div class="col-8">
                    <p><span style="color: #0d88ec">Nombre: </span>{{ $user->name. ' ' .$user->surname }}</p>
                    <p><span style="color: #0d88ec">Nick: </span>{{ $user->nick }}</p>
                    <p><span style="color: #0d88ec">Email: </span>{{ $user->email }}</p>
                    <p><span style="color: #0d88ec">Se dio de alta: </span>{{ $user->created_at->diffForHumans() }}</p>
                    <p><span style="color: #0d88ec">Ultima actualizacion: </span>{{ $user->updated_at->diffForHumans() }}</p>
                </div>
            </div>

        </div>
    </div>

    <div class="card" style="margin-top:2em">
        <div class="card-header">Actividad</div>
        <div class="card-body">
            <div class="row">
                {{-- @dd($user) --}}
                <div class="col-4">
                    <p><span style="color: #0d88ec">Publicaciones: </span>{{ $user->nPost() }}</p>
                    <p><span style="color: #0d88ec">Likes: </span>{{ $user->nLikes() }}</p>
                    <p><span style="color: #0d88ec">Comentarios: </span>{{ $user->nComents() }}</p>
                </div>
                <div class="col-8">
                    @foreach($user->myPost() as $post)
                        <a href="/post/{{ $post->id}}"><img src="{{ asset('image/post/' . $post->url) }}" width="150" height="150"></a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@stop
