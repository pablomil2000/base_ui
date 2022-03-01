@extends('layouts.layout')

@section('recetas1')
    <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Ultimas 3 Recetas</h1>
    </div>
    <div class="row">

        @foreach ($recipe1 as $recipe )
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/image/Recipe/{{ $recipe->image }}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe->title}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a href="{{ url('/recipes/'.$recipe->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
@endsection
    {{-- Tiene que ser 2 --}}
@section('recetas2')
    <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Recetas favoritas</h1>
    </div>
    <div class="row">
        @foreach ($recipe1 as $recipe )
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/image/Recipe/{{ $recipe->image }}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a href="{{ url('/recipes/'.$recipe->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection

@section('recetas3')
    <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Entrantes</h1>
    </div>
    <div class="row">
        @foreach ($recipe3 as $recipe )
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/image/Recipe/{{ $recipe->image }}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a href="{{ url('/recipes/'.$recipe->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection

@section('recetas4')
    <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Primros</h1>
    </div>
    <div class="row">
        @foreach ($recipe4 as $recipe )
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/image/Recipe/{{ $recipe->image }}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a href="{{ url('/recipes/'.$recipe->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection

@section('recetas5')
    <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Segundos</h1>
    </div>
    <div class="row">
        @foreach ($recipe5 as $recipe )
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/image/Recipe/{{ $recipe->image }}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                            <a href="{{ url('/recipes/'.$recipe->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection

@section('recetas6')
    <div class="section-heading">
        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Postres</h1>
    </div>
    <div class="row">
        @foreach ($recipe6 as $recipe )
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/image/Recipe/{{ $recipe->image }}" height="200px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="{{ url('/recipes/'.$recipe->id) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endsection
