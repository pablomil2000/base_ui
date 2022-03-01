@extends('layouts.layout')


@section('recetas1')

<div class="row">
    <div class="col-lg-12">
        <div class="work-single-image">
            <!-- Work Single Image -->
            <img class="img-fluid w-100" src="/image/Recipe/{{ $recipe->image }}" alt="work-single-image">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="work-single-content">
            <h3>{{ $recipe->title }}</h3>

            <div class="row">
                <button type="button" class="btn btn-outline-primary">Category: {{ $recipe->category->name }}</button>
                <button type="button" class="btn btn-outline-primary">Autor: {{ $recipe->User->name }}</button>
                <button type="button" class="btn btn-outline-primary">Fecha: {{ $recipe->created_at }}</button>


                @auth
                    @if (!$likes)
                        <a href="/like/{{ $recipe->id }}"><button type="button" class="btn btn-outline-primary">Me gusta</button></a>
                    @else
                        <a href="/dlike/{{ $recipe->id }}">  <button type="button" class="btn btn-danger">Me gusta</button>
                        </a>
                    @endif
                    <a href="{{ url('/recipes') }}">volver</a>
                @else
                <a href="{{ url('/') }}">volver</a>
                @endauth


            </div>

            <b>Ingredientes</b>
            <p>{{ $recipe->ingre }}</p>

            <b>Preparacion</b>
            <p>{{ $recipe->prepa }}</p>
        </div>
    </div>
</div>

@endsection
