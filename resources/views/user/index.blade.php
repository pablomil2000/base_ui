@extends('layouts.app')

@section('navbar')
    @include('partials.navbar')
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de {{ Auth::user()->name }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}:</label>

                            <div class="col-md-6">
                                {{ Auth::user()->name }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="surName" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->surname }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nick" class="col-md-4 col-form-label text-md-end">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->nick }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                            <div class="col-md-6">
                                <img src="img/users/{{ Auth::user()->img }}" alt="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Creado hace</label>

                            <div class="col-md-6">
                                {{ Auth::user()->created_at->diffforhumans()}}
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
