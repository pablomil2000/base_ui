@extends('layouts.app')

@section('content')

@include('/partials/flash')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <h1>{{ $recipe->name }}</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('/image/recipes/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="img-responsive">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button href="" class="btn btn-outline-primary">Categoria: {{ $recipe->Category->name }}</button>
                            </div>
                            <div class="col-3">
                                <button href="" class="btn btn-outline-success">Autor: {{ $recipe->User->name }}</button>
                            </div>
                            <div class="col-3">
                                <button href="" class="btn btn-outline-warning">fecha: {{ $recipe->created_at }}</button>
                            </div>
                            <div class="col-3">
                                <button href="" class="btn btn-outline-danger">Me gusta </button>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('recipes') }}" class="btn btn-outline-disabled">vovler</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color: #0d6efd">Ingredientes</h3>
                                <p>{{ $recipe->ingredients }}</p>
                            </div>

                            <div class="col-md-12">
                                <h3 style="color: #0d6efd">Preparacion</h3>
                                <p>{{ $recipe->preparacion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection