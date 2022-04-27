@extends('admin.layouts.layout')

@section('flash')
    @include('admin.partials.flash')
@endsection


@section('header')
    @include('admin.partials.header')
@endsection

@section('content')
    {{-- @include('coolAdmin.partials.post-table') --}}
    {{-- @include('coolAdmin.partials.users-table') --}}

    @include('admin.partials.post-form')
@endsection
