@extends('layouts.layout')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
    <div id="hello">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <h1>Bolt Template</h1>
                    <h2>Awesome Bootstrap Template</h2>
                </div>
                <!-- /col-lg-8 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /hello -->
@endsection

@section('content2')
    @include('partials.coches1')
@endsection