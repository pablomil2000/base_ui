@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card" style="width: 18rem; border: 1px dotted">
                        <div class="card-body">
                            <h5 class="card-title">Profesores</h5>
                            <a href="AddProfessor" class="card-link" style="text-decoration: none; color: black">
                                <h6 class="card-subtitle mb-2 text-muted">Añadir profesores</h6>
                            </a>
                            <a href="listProfessor" class="card-link" style="text-decoration: none; color: black">
                                <h6 class="card-subtitle mb-2 text-muted">Ver profesores</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card" style="width: 18rem; border: 1px dotted">
                        <div class="card-body">
                            <h5 class="card-title">Alumnos</h5>
                            <a href="AddAlumno" class="card-link" style="text-decoration: none; color: black">
                                <h6 class="card-subtitle mb-2 text-muted">Añadir Alumnos</h6>
                            </a>
                            <a href="listAlumno" class="card-link" style="text-decoration: none; color: black">
                                <h6 class="card-subtitle mb-2 text-muted">Ver Alumnos</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
