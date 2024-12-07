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
    }

    .sidebar .navbar-brand {
        font-weight: 600;
        font-size: 1.8rem;
        padding: 15px 20px;
        color: black;
        text-align: center;
    }

    .sidebar .navbar-brand span {
        color: white;
    }

    .sidebar .navbar-brand:hover {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .sidebar .navbar-brand:hover span {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .sidebar .navbar-brand: span {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .sidebar .nav-link {
        display: block;
        padding: 10px 20px;
        font-size: 1.2rem;
        font-weight: normal;
        color: white;
    }

    .sidebar .nav-link:hover {
        background-color: #ffffff;
        color: black;
        font-weight: bold;
    }
</style>

<div class="sidebar">
    <a class="navbar-brand" href="{{ route('products.index') }}">5th <span>Apparel</span></a>
    <a class="nav-link" href="{{ route('products.index') }}">Product</a>
    <a class="nav-link" href="{{ route('suppliers.index') }}">Supplier</a>
    <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a>
    <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
</div>