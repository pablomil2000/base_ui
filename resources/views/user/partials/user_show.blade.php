<section class="clases mt-5 py-5">
    <h2 class="separador text-center mb-3">Informacion de Usuario</h2>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('img/users/' . $user->image) }}" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0" style="color: black"><b>{{ $user->name }}</b><br>
                            Saldo: <span class="badge badge-secondary px-2 py-2">{{ $user->balance }} €</span>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="balance" class="col-md-4 col-form-label text-md-end">{{ __('balance') }}</label>

                        <div class="col-md-6">
                            <input id="balance" type="number" min="0"
                                class="form-control @error('balance') is-invalid @enderror" name="balance" required
                                value="{{ $user->balance }}">

                            @error('balance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Cambiar') }}
                            </button>
                        </div>
                    </div>
                </form>



            </div>

            <nav aria-label="Page navigation example">
                <a href="{{ route('home') }} "class="alert alert-danger">Volver</a>
            </nav>
        </div>

        {{-- @dd($user->Recipes) --}}
        <h2 class="separador text-center mb-3">Mis cursos</h2>

        @if ($user->profesor)
        <a href="/cursos/new">Nuevo curso</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user->Recipes as $curso)
                        <tr>
                            <th scope="row">{{ $curso->id }}</th>
                            <td>{{ $curso->name }}</td>
                            <td>{{ $curso->description_C }}</td>
                            <td>{{ $curso->precio }} €</td>

                            
                            @if ($curso->estado == 0)
                                <td>Proximamente</td>
                            @elseif ($curso->estado == 1)
                                <td>Disponible</td>
                            @elseif ($curso->estado == 2)
                                <td>Cancelado</td>
                            @elseif ($curso->estado == 3)
                                <td>Finalizado</td> 
                            @endif
                            {{-- <td>{{ $curso->estado }}</td> --}}
                            <td>
                                <a href="/cursos/{{ $curso->id }}/edit" >Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach ($cursos as $curso)
                    <tr>
                        <th scope="row">{{ $curso->id }}</th>
                        <td>{{ $curso->name }}</td>
                        <td>{{ $curso->description_C }}</td>
                        <td>{{ $curso->precio }} €</td>
                        <td>
                            <a href="/curso/{{ $curso->id }}/delete" >Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @endif

    </div>


</section>
