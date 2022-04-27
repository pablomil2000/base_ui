@extends('admin.layouts.layout')

@section('header')
    @include('admin.partials.header')
@endsection

@section('content')
    @include('admin.partials.post-table')
    {{-- @include('admin.partials.users-table') --}}
@endsection

@section('welcome')
    @include('admin.partials.welcome')
@endsection

@section('estadisticas')
    @include('admin.partials.estadisticas')
@endsection

@section('flash')
    @include('admin.partials.flash')
@endsection
