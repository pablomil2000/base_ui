@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/user/galery/create') }}"><button class="btn btn-primary">Nuevo albun</button></a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nueva galeria</div>
                    <form method="POST" action="">
                        @csrf
                        <div class="row mb-3">
                            <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="string" class="form-control " name="title" required autofocus value="{{$gallery->title}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control " name="description" required autofocus value="{{$gallery->descripcion}}">
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
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