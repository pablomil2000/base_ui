<section class="clases mt-5 py-5">
    <h2 class="separador text-center mb-3">Nuestros Cursos</h2>

    <div class="container">
        <div class="row">
            {{-- @foreach ($recipes as $recipe) --}}
            {{-- @dd($recipe) --}}
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($cursos->UrlImage) }}" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0" style="color: black"><b>{{ $cursos->name }}</b>
                            <span class="badge badge-secondary px-2 py-2">{{ $cursos->precio }} €</span>
                            <br>
                            @if ($cursos->estado == 0)
                                <span class="badge badge-primary px-2 py-2">Proximamente</span>
                            @elseif ($cursos->estado == 1)
                                @if ($cursos->capacidad > count($cursos->inscritos))
                                    <span class="badge badge-success px-2 py-2">Disponible</span>
                                @else
                                    <span class="badge badge-warning px-2 py-2">Curso lleno</span>
                                @endif
                            @elseif ($cursos->estado == 2)
                                <span class="badge badge-danger px-2 py-2">Cancelado</span>
                            @elseif ($cursos->estado == 3)
                                <span class="badge badge-light px-2 py-2">Finalizado</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <h3 class="card-title">{{ $cursos->name }}</h3>
                <p class="card-subtitle mb-2">{{ $cursos->description_L }}</p>

                @if ($cursos->estado == 0)
                    <span class="badge badge-primary px-2 py-2">Proximamente</span>
                @elseif ($cursos->estado == 1)
                    @if ($cursos->capacidad > count($cursos->inscritos))
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="badge badge-success px-2 py-2">Disponible</button>
                        </form>
                    @else
                        <span class="badge badge-warning px-2 py-2">Curso lleno</span>
                    @endif
                @elseif ($cursos->estado == 2)
                    <span class="badge badge-danger px-2 py-2">Cancelado</span>
                @elseif ($cursos->estado == 3)
                    <span class="badge badge-light px-2 py-2">Finalizado</span>
                @endif

            </div>
            {{-- @endforeach --}}

            <nav aria-label="Page navigation example">
                <a href="{{ route('home') }} "class="alert alert-danger">Volver</a>
            </nav>

            {{-- <!--.col-md-4-->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/clase2.jpg" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0">16 / Junio / 2022 18:00 Hrs
                            <span class="badge badge-secondary px-2 py-2">25 €</span>
                            <span class="badge badge-success px-2 py-2">Plazas disponibles</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Menús para bodas</h3>
                        <p class="card-subtitle mb-2">Añade el diseño de menús para bodas a tus habilidades.</p>
                        <p>Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat
                            mattis. Quisque egestas.</p>
                        <a href="#">Más Información.</a>
                    </div>
                </div>
            </div>
            <!--.col-md-4-->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/clase3.jpg" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0">17 / Junio / 2022 18:00 Hrs
                            <span class="badge badge-secondary px-2 py-2">30 €</span>
                            <span class="badge badge-primary px-2 py-2">Próximamente</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Pasteles al pellejo</h3>
                        <p class="card-subtitle mb-2">
                            Aprende a preparar deliciosos postres con este curso.
                        </p>
                        <p>Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat
                            mattis. Quisque egestas.</p>
                        <a href="#">Más Información.</a>
                    </div>
                </div>
            </div>
            <!--.col-md-4-->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/clase4.jpg" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0">11 / Junio / 2022 18:00 Hrs
                            <span class="badge badge-secondary px-2 py-2">30 €</span>
                            <span class="badge badge-light px-2 py-2">Finalizado</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Mexico lindo</h3>
                        <p class="card-subtitle mb-2">Prepara la mejor comida mexicana con este curso </p>
                        <p>Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat
                            mattis. Quisque egestas.</p>
                        <a href="#">Más Información.</a>
                    </div>
                </div>
            </div>
            <!--.col-md-4-->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/clase5.jpg" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0">19 / Junio / 2022 18:00 Hrs
                            <span class="badge badge-secondary px-2 py-2">30 €</span>
                            <span class="badge badge-danger px-2 py-2">Cancelado</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Marruecos </h3>
                        <p class="card-subtitle mb-2">
                            Aprende deliciosas recetas de la comida marroquí.
                        </p>
                        <p>Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat
                            mattis. Quisque egestas.</p>
                        <a href="#">Más Información.</a>
                    </div>
                </div>
            </div>
            <!--.col-md-4-->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/clase6.jpg" class="card-img-top">
                    <div class="card-meta bg-primary p-2 text-light">
                        <p class="text-center m-0">20 / Junio / 2022 18:00 Hrs
                            <span class="badge badge-secondary px-2 py-2">18 €</span>
                            <span class="badge badge-success px-2 py-2">Plazas disponibles</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Festival de ensaladas</h3>
                        <p class="card-subtitle mb-2">
                            En este curso aprenderás hasta 10 tipos de ensaladas.
                        </p>
                        <p>Nulla facilisi. Vestibulum commodo mattis orci, a dignissim nunc. In feugiat volutpat
                            mattis. Quisque egestas.</p>
                        <a href="#">Más Información.</a>
                    </div>
                </div>
            </div>
            <!--.col-md-4--> --}}
        </div>
    </div>
</section>
