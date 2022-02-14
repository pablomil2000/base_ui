@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/user/galery/id') }}"><button class="btn btn-primary">Nuevo imagen</button></a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Galeria</div>
                    
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
