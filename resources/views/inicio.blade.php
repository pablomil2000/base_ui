@extends('layouts/layout')


@section('navbar')
    @include('partials.navbar')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    @include('partials.posts')
@endsection

@section('footer')
    @include('partials.footer')
@endsection