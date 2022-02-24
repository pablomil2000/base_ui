@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                            @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <br>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="40" rows="5" required
                                style="resize: none;"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <br>
                            <button class="btn btn-primary">Publicar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

    </div>

@stop
