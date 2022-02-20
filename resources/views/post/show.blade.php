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
                    <div class="row">
                        <form method="post"></form>
                        <textarea class="form-control" name="description" cols="40" rows="5" required
                        style="resize: none;"></textarea>

                    </div>

                    {{-- <div class="row"> --}}
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
                                <a href="{{ url('/dlike/'.$post->id) }}">
                                    <button type="" class="btn"><img width="64" height="64" src="{{ asset('image\Likes\hearts-rojo-64.png') }}" alt=""></button>
                                </a>
                                <?php
                            }
                        ?>

                        <a href="{{ route('home') }}"><button type="button" class="btn btn-outline-info">Volver</button>
                        </a>
                        {{-- <a href="{{ url('/post/'.$post->id) }}"><button class="btn btn-primary btn-sm">Comanetarios</button></a> --}}
                    {{-- </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>

@stop
