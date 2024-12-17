<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        background-color: #FF6347;
        height: 100%;
        padding-top: 20px;
        z-index: 1000;
        box-shadow: 1px 0 5px 2px rgba(0, 0, 0, 0.3);
    }

    .sidebar a {
        text-decoration: none;
    }

    .navbar-brand {
        font-weight: 600;
        font-size: 1.8rem;
        padding: 15px 20px;
        color: black;
        text-align: center;
    }

    .navbar-brand span {
        color: white;
    }

    .navbar-brand:hover {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar-brand:hover span {
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
    }
    
    .nav-link {
        display: block;
        margin: 16px 0;
        padding: 10px 20px;
        font-size: 1.2rem;
        font-weight: normal;
        color: white;
    }

    .nav-link:hover {
        background-color: #ffffff;
        color: #FF6347;
        font-weight: bold;
    }
</style>

<div class="sidebar">
    <a class="navbar-brand" href="{{ route('dashboard') }}">5th <span>Admin</span></a>
    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="nav-link" href="{{ route('products.index') }}">Product</a>
    <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
    <a class="nav-link" href="{{ route('suppliers.index') }}">Supplier</a>
    <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a>
</div>