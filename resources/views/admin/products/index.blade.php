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
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }} €</td>
                    <td>
                        <a href="{{ url('product/'.$product->id) }}">view</a>
                        <a href="{{ url('admin/product/'.$product->id).'/edit' }}">Edit</a>
                        <a href="{{ url('admin/product/'.$product->id).'/delete' }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
