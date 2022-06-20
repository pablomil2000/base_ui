@extends('admin.layouts.layout')

@section('header.movil')
    @include('admin.partials.header-movil')
@endsection

@section('header.desktop')
    @include('admin.partials.header-desktop')
@endsection

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('content')
    @include('admin.partials.cards')
    @include('admin.partials.table-ventas')
@endsection
