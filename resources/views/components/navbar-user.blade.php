<style>
  .navbar {
    height: 80px;
    position: fixed;
    z-index: 99;
  }

  .navbar-brand  {
    font-weight: 700;
    font-size: 20px;
  }

  .navbar-brand span {
    color: #FF6347;
  }

  .nav-link {
    font-size: 16px;
  }

  .nav-link.active {
    font-weight: 700;
    color: #FF6347 !important;
  }

  .nav-link:hover {
    color: #FF6347;
  }


</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light w-100" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">5th <span>Apparrel</span></a>
           
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2 ">
                    <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Product</a>
                    </li>
                    <li class="nav-item mx-2">
                    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                </ul>
                <div>
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login as Admin') }}</a>
                </div>
            </div>
        </div>
    </nav>

