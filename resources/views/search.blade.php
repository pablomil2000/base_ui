@extends('layout')

@section('menu')
    @include('partials.menu')
@endsection

@section('content')
    @include('partials.buscador')
    @include('partials.resulBusqueda')
@endsection
