@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @auth
                    @if (auth()->user()->admin)
                        {{ __('You are admin') }}
                        @include('admin.partials.dashboard')
                    @else
                        {{ __('You are table') }}
                        @include('waiter.partials.mesas')
                    @endif
                @else

                @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
