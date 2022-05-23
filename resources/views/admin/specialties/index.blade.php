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
                    <div class="card-header"><a href="newSpecialties">Nueva Especialidad</a></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($especialidades as $especialidad)
                                    <tr>
                                        <th scope="row">{{ $especialidad->id }}</th>
                                        <td>{{ $especialidad->name }}</td>
                                        <td><a class="btn btn-danger" href="deleteSpecialties/{{ $especialidad->id }}">Delete</a><a class="btn btn-warning" href="editSpecialties/{{ $especialidad->id }}">Edit</a></td>
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
