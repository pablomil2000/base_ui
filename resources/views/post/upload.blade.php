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
                            <input type="file" name="image" class="form-control" required>
                            <br>
                            <textarea class="form-control" name="description" cols="40" rows="5" required
                                style="resize: none;"></textarea>
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
