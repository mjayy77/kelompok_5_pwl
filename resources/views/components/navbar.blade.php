<style>
    .navbar {
        padding: 5px 5%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 10vh;
        z-index: 1000;
    }

    .nav-color {
        background-color: white;
        transition: all ease-in-out 0.3s;
        box-shadow: 0 1px 5px 2px rgba(0, 0, 0, 0.3);
    }

    .bg-transparent {
        transition: all ease-in-out 0.3s;
    }

    .nav-item {
        margin: 35px;
        margin-right: 0;
    }

    #nav-link {
        background: none;
        border: none;
        padding: 0;
        color: black;
        font-size: 1.2rem;
        font-weight: bold;
    }

    #nav-link:hover {
        color: #FF6347;
        font-size: 1.2rem;
    }

    #navbarDropdown {
        background: none;
        border: none;
        padding: 0;
        color: black;
        margin: 16px 0;
        font-size: 1.2rem;
        font-weight: bold;
    }

    #navbarDropdown:hover {
        color: #FF6347;
        font-size: 1.2rem;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>
