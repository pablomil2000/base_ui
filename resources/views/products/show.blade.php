@extends('layouts.layout')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    {{-- @include('partials.categorias') --}}
    {{-- @include('partials.productos') --}}

    @include('partials.details')

    {{-- {{ $productos->links() }} --}}
@endsection
@section('blog')
    {{-- @include('partials.blog') --}}
@endsection

@section('footer')
    @include('partials.footer')
@endsection
