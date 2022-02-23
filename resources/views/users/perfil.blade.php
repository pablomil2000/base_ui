@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Mi perfil</div>
        <div class="card-body">
            <div class="row">
                {{-- @dd($user) --}}
                <div class="col-3"><img src="{{ asset('image/users/'.$user->image)}}" alt=""></div>
                <div class="col-9">asd</div>
            </div>

        </div>
    </div>
</div>

@stop
