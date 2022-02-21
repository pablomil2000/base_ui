@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif --}}

            {{-- @foreach ($posts as $post) --}}
            <div class="card">
                <div class="card-header">{{ $post->User->nick }}</div>
                <div class="card-body">
                    <div class="row">
                        <img src="{{ asset("image\post/".$post->url) }}" alt="">
                    </div>
                    <p>Publicado: {{ $post->created_at->diffForHumans() }}</p>
                    <p>Descripcion: {{ $post->description }}</p>
                </div>



                <div class="card-footer">
                    <?php
                        $a=0;
                            foreach ($likes as $like){
                                if ($like->post_id == $post->id){
                                    $a++;
                                }
                            }

                            if ($a==0) {
                                ?>
                                <a href="{{ url('/like/'.$post->id) }}">
                                    <button type="" class="btn"><img width="64" height="64" src="{{ asset('image\Likes\hearts-gris-64.png') }}" alt=""></button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <a href="{{ url('/like/'.$post->id) }}">
                                    <button type="" class="btn"><img width="64" height="64" src="{{ asset('image\Likes\hearts-rojo-64.png') }}" alt=""></button>
                                </a>
                                <?php
                            }
                            $likes = count($post->likesAttribute(1));
                            echo $likes;
                        ?>
                    <div class="row">
                        <form method="post">
                            @csrf
                            <textarea class="form-control" name="description" cols="40" rows="5" required
                            style="resize: none;"></textarea>
                            <button type="submit" class="btn btn-success">Enviar</button>
                            <a href="{{ route('home') }}"><button type="button" class="btn btn-outline-info">Volver</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            @foreach ($coments as $coment)
            <div class="row">
                <div class="card">
                    <div class="card-header">{{ $post->User->nick }}</div>
                    <div class="card-body" style="background-color: $blue-200">
                        <div class="row">
                            {{ $coment->description }}
                        </div>
                    </div>
                    <div class="card-footer">
                        @if ($coment->user_id == auth()->user()->id || $post->user_id == auth()->user()->id)
                            <form method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="coment" value="{{ $coment->id }}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop
