<style>
    .navbar {
        padding: 5px 5%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        color: black;
    }

    .nav-color {
        background-color: white;
        transition: all ease-in-out 0.3s;
    }

    .bg-transparent {
        transition: all ease-in-out 0.3s;
    }

    #logout {
        background: none;
        border: none;
        padding: 0;
        color: black;
        margin: 16px 0;
        font-size: 1.2rem;
        font-weight: bold;
    }

    #logout:hover {
        color: #FF6347;
        font-size: 1.2rem;
    }

    #show {
        background: #394867;
        color: white;
        transition: 0.2s;
    }

    #show:hover {
        background: #212A3E;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent" id="navbar">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" id="logout">Logout</button>
                    </form>
                @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
