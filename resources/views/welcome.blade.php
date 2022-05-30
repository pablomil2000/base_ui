@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card m-1">
                    <div class="card-header">Ultimas 3 recetas</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($recipes1 as $recipes)
                                <div class="col-3">
                                    <div class="card m-1">
                                        <div class="card-header">{{ $recipes->name }}</div>
                                        <div class="card-body">
                                            <img src="image/recipes/{{ $recipes->image }}" alt="{{ $recipes->name }}"
                                                class="img-fluid">
                                            <p class="card-text">{{ Str::limit($recipes->description), 10 }}</p>
                                            <a href="{{ route('recipes.show', $recipes->id) }}"
                                                class="btn btn-primary">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card m-1">
                    <div class="card-header">Recetas que mas gustan</div>

                    <div class="card-body">

                    </div>
                </div>

                @foreach ($categories as $category)
                    <div class="card m-1">
                        <div class="card-header">{{ $category->name }}</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($category->recipes as $recipe)
                                    <div class="col-3">
                                        <div class="card m-1">
                                            <div class="card-header">{{ $recipe->name }}</div>
                                            <div class="card-body">
                                                <img src="image/recipes/{{ $recipe->image }}"
                                                    alt="{{ $recipe->name }}" class="img-fluid">
                                                <p class="card-text">{{ Str::limit($recipe->description), 10 }}</p>
                                                <a href="{{ route('recipes.show', $recipe->id) }}"
                                                    class="btn btn-primary">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
