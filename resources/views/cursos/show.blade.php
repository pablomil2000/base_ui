@extends('layouts.layout')

@section('header')
    @include('partials.header')
@endsection
{{-- 
@section('cabecera')
    @include('partials.cabecera')
@endsection --}}

@section('content')

{{-- mostrar flash --}}

@include('cursos.partials.cursos_show')




@endsection
