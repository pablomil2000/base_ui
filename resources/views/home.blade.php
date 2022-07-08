@extends('layouts.layout')

@section('header')
    @include('partials.header')
@endsection

@section('cabecera')
    @include('partials.cabecera')
@endsection

@section('content')

{{-- mostrar flash --}}

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

@include('partials.cursos_public')

@endsection
