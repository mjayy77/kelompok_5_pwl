<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '5th Apparel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
    body {
        font-family: "Poppins", sans-serif;
        overflow: hidden;
    }

    /* navbar */
    #nav-container {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .navbar {
        padding: 5px 5%;
        height: 10vh;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background-color: #FF6347;
        box-shadow: 0 1px 5px 2px rgba(0, 0, 0, 0.3);
    }

    #nav-left {
        left: 0;
    }

    #nav-right {
        position: absolute;
        right: 0;
        margin-right: 100px;
    }

    .nav-link {
        background: none;
        border: none;
        padding: 0;
        color: white;
        margin: 16px;
        margin-right: 0;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .nav-link:hover {
        color: black;
    }

    .navbar-brand {
        color: black;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .navbar-brand span {
        color: white;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container" id="nav-container">
                <a class="navbar-brand" id="current-page-link">5th <span>Apparel</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto" id="nav-left">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" id="nav-right">
                        <!-- Authentication Links -->
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

        <main class="py-4" id="main-content">
            @yield('content')
        </main>
    </div>
    
</body>

<script>
  document.getElementById('current-page-link').href = window.location.href;
</script>

</html>
