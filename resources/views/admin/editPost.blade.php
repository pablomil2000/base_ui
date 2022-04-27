@extends('admin.layouts.layout')

@section('flash')
    @include('admin.partials.flash')
@endsection


@section('header')
    @include('admin.partials.header')
@endsection

@section('content')
    @include('admin.partials.edit-post')
@endsection
