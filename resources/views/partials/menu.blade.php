<div class="sidebar">
    <i class="fab fa-twitter"></i>
    <div class="sidebarOption active">
        <span class="material-icons"> home </span>
        <a href="/home" style="text-decoration: none; color: #50B7F5"><h2>Home</h2></a>
    </div>

    <div class="sidebarOption">
        <span class="material-icons"> search </span>
        <a href="/search" style="text-decoration: none; color: black"><h2>Buscar</h2></a>
    </div>

    <div class="sidebarOption">
        <span class="material-icons"> account_circle </span>
        <a href="/users/{{ Auth::id(); }}" style="text-decoration: none; color: black"><h2>Perfil</h2></a>
    </div>

    <div class="sidebarOption">
        <span class="material-icons"> login </span>

        <a class="dropdown-item" style="text-decoration: none; color:black;"href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <h2>Salir</h2>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <button class="sidebar__tweet">Tweet</button>
</div>
