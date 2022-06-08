@extends('layouts.layout')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('content')
<div id="hello">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 centered">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Marca</label>
                        <input name="marca" type="text" class="form-control" placeholder="Marca">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Modelo</label>
                        <input name="model" type="text" class="form-control" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">color</label>
                        <input name="color" type="color" class="form-control" placeholder="color">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Matricula</label>
                        <input name="placa" type="text" class="form-control" placeholder="Matricula">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio Inicial</label>
                        <input name="precioInicial" type="text" class="form-control" placeholder="Precio Inicial">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">image</label>
                        <input name="image" type="file" class="form-control" placeholder="color">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection