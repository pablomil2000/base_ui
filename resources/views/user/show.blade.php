@extends('layouts.layout')

@section('header')
    @include('partials.header')
@endsection

{{-- @section('cabecera')
    @include('partials.cabecera')
@endsection --}}

@section('content')
    {{-- mostrar flash --}}
    @include('user.partials.user_show')
@endsection
