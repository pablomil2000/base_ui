<div class="span7 navigation">
    <div class="navbar hidden-phone">
        <ul class="nav">
            <li class="dropdown active">
                <a href="#">Home</a>
            </li>

            @auth
                <li><a href="/addCar">Añadir Coche</a></li>
                <li><a href="../formularios/FormVenta.php">Vender Coche</a></li>
                <li><a href="../formularios/subastas.php">Subastas</a></li>

                <li class="dropdown active">
                    <a href="#">Zona de {{ auth()->user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="../formularios/formalta.php?editusu">Editar</a></li>
                        <li><a href="../codigo/prinicipal.php?delusuario">Borrar</a></li>
                        <li><a href="../codigo/prinicipal.php?ofertas">Ofertas</a></li>
                        <li><a href="../codigo/prinicipal.php?cerrar">Cerrar Session</a></li>
                    </ul>
                </li>
            @else
                <li><a href="../formularios/formalta.php?registro">Registrarse</a></li>
                <li><a href="../formularios/formalta.php?acceder">Acceder</a></li>
            @endauth




    </div>
</div>
