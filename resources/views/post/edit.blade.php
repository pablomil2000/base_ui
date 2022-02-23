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
                <div class="card-header">Actualizar publicacion</div>
                <div class="card-body">
                    <div class="row">
                        <img src="{{ asset("image\post/".$post->url) }}" alt="">
                    </div>
                    {{-- <p>Publicado: {{ $post->created_at->diffForHumans() }}</p> --}}
                    <p>Descripcion: {{ $post->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
