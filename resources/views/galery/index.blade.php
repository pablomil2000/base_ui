@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/user/galery/create') }}"><button class="btn btn-primary">Nuevo albun</button></a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inicio</div>
                    @foreach ($galleries as $galery)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $galery->title }}</h5>
                                <p class="card-text">{{ $galery->descripcion }}</p>
                                <a href="/user/galery/{{ $galery->id}}" class="btn btn-primary">ver fotos</a>
                                <a href="/user/galery/{{ $galery->id}}/edit" class="btn btn-primary">Editar</a>
                                <a href="/user/galery/{{ $galery->id}}/delete" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('navbar')
    @include('partials.navbar')
@stop
