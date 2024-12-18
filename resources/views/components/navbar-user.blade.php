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

    #nav-left {
        left: 0;
    }

    #nav-right {
        position: absolute;
        right: 0;
        margin: 100px;
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

    .bg-transparent .nav-link {
        background: none;
        border: none;
        padding: 0;
        color: white;
        font-size: 1.2rem;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .bg-transparent .navbar-brand {
        font-weight: 600;
        font-size: 1.8rem;
        padding: 15px 20px;
        color: white;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .bg-transparent .navbar-brand:hover {
        color: #FF6347;
        transition: all ease-in-out 0.3s;
    }

    .nav-color .nav-link {
        background: none;
        border: none;
        padding: 0;
        color: black;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .nav-link:hover {
        color: #FF6347;
        font-size: 1.2rem;
    }

    .nav-color .navbar-brand {
        font-weight: 600;
        font-size: 1.8rem;
        padding: 15px 20px;
        color: black;
        text-align: center;
    }

    .nav-color .navbar-brand span {
        color: #FF6347;
    }

    .nav-color .navbar-brand:hover {
        color: black;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .nav-color .navbar-brand:hover span {
        text-shadow: 2px 2px 4px rgba(255, 99, 71, 0.5);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto" id="nav-left">
                <a class="navbar-brand" href="{{ route('home.index') }}">5th <span>Apparel</span></a>
            </ul>
            <ul class="navbar-nav ms-auto" id="nav-right">
                <li>
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login as Admin') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>