@extends('layouts.layout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible col-md-8">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header"><a href="newAnimador">Nuevo Fiesta</a></div> --}}

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parties as $party)
                                    <tr>
                                        <th scope="row">{{ $party->id }}</th>
                                        <td>{{ $party->titulo }}</td>
                                        <td>{{ $party->precio }} €</td>
                                        <td>
                                            {{ $party->user->name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
