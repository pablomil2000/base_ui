@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Actualizar publicacion</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4"><img src="{{ asset('image\post/' . $post->url) }}" width="150"
                                        alt=""></div>
                                <div class="col-8"><label>Cambiar IMG</label><input class="form-control"
                                        type="file" name="image"></div>
                            </div>
                            <div class="row" style="margin-top:2em">
                                <p><label>Descripcion:</label><textarea
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        cols="30" rows="10">{{ $post->description }}</textarea></p>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
