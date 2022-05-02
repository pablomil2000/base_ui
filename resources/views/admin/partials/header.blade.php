<header>
    <div class="contenedor">
        <div class="logo izquierda">
            <p><a href="/admin/">Blog Examen</a></p>
        </div>

        <div class="derecha">
            <form name="busqueda" class="buscar">
                <input type="text" name="busqueda" placeholder="Buscar">
                <button type="submit" class="icono fa fa-search"></button>
            </form>
            <nav class="menu">
                <ul>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    {{-- <li><a href="#">Contacto <i class="icono fa fa-envelope"></i></a></li> --}}
                    @auth
                        <li class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                    <li><a href="{{ route('login') }}">Login<i class="icono fa fa-user"></i></a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</header>
