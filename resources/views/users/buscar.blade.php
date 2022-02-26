@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <h1>Buscador</h1>
            <form action="" method="get" class="card card-sm">
                <div class="col-8">
                    <input type="search" name="" id="" class="form-control">
                    <button type="submit" value="" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>

        @foreach ($users as $user)
            @if ($user->id != auth()->user()->id)
                <div class="card">
                    <div class="card-header">Nick: {{'@'. $user->nick }}</div>
                    <div class="card-body">
                        <div class="row">
                            {{-- @dd($user) --}}
                            <div class="col-4"><img src="{{ asset('image/users/' . $user->image) }}" alt=""
                                    height="125"></div>
                            <div class="col-8">
                                <p><span style="color: #0d88ec">Nombre: </span>{{ $user->name . ' ' . $user->surname }}</p>

                                <p><span style="color: #0d88ec">Email: </span>{{ $user->email }}</p>
                                <p><span style="color: #0d88ec">Antiguedad:
                                    </span>{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach

    </div>

@stop
