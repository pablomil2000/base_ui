@extends('layouts.layout')

@section('content')
    <?php
    // Use carbon para mostrar tiempo
    use Illuminate\Support\Carbon;
    ?>

    <div class="container">
        <div class="row justify-content-center">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible col-md-12">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><a href="newAnimador">Nuevo Fiesta</a></div>

                    <div class="card-body">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Lugar</th>
                                    <th scope="col">Asistentes</th>
                                    <th scope="col">Animadores</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parties as $party)
                                    <tr>
                                        <th scope="row">{{ $party->id }}</th>
                                        <td>{{ $party->titulo }}</td>
                                        <td>{{ $party->fecha }}</td>
                                        <td>{{ $party->hora }}</td>
                                        <td>{{ $party->lugar }}</td>
                                        <td>{{ $party->asistentes }}</td>
                                        <td>{{ $party->Go->count() }}</td>
                                        {{-- @dd($party->Animators()) --}}

                                        <td>{{ number_format($party->precio, 2) }} €</td>
                                        <td>
                                            @if ($party->aceptada)
                                                <a class="btn btn-danger" href="cancel/{{ $party->id }}">Cancelar</a>
                                            @else
                                                <a class="btn btn-success" href="acept/{{ $party->id }}">Aceptar</a>
                                                <a class="btn btn-danger" href="cancel/{{ $party->id }}">Cancelar</a>
                                            @endif
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection
