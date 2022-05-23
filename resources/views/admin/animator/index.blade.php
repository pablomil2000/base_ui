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
                    <div class="card-header"><a href="newAnimador">Nuevo animador</a></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Especialidad</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animators as $animator)
                                    <tr>
                                        <th scope="row">{{ $animator->id }}</th>
                                        <td>{{ $animator->name }}</td>
                                        <td>{{ $animator->Specialty->name }}</td>
                                        <td><a class="btn btn-danger" href="deleteAnimador/{{ $animator->id }}">Delete</a><a class="btn btn-warning" href="editAnimador/{{ $animator->id }}">Edit</a></td>
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
