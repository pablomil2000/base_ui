<header class="header">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('img/logo.svg') }}" class="img-fluid">
            </div>
            <div class="col">
                <nav
                    class="nav flex-column flex-md-row text-center d-flex justify-content-md-end justify-content-center">

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>   
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                            <a id="navbarDropdown" class="nav-link" href="/user/{{ auth()->user()->id }}" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="badge badge-secondary px-2 py-2">{{ Auth::user()->balance }} €</span>

                            </a>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    @endguest
                </nav>
            </div>
        </div>
    </div>
</header>
