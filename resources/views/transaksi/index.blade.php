<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaction </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<style>
@import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;1,300;1,500;1,800;1,900&family=Poppins:wght@400;600&family=Rancho&display=swap');

    body {
          font-family: "Poppins", sans-serif;
          background: #DDDDDD;
        }

    /* Navbar */
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

        .navbar-brand:hover {
            color: black;
            text-decoration: none;
        }

        .nav-link {
            color: black;
            margin: 16px;
            font-size: 1.2rem;
        }

        .nav-link:hover {
            color: #FF6347;
            margin: 16px;
            font-size: 1.2rem;
        }

        #btn {
            background: #10375C;
            color: white;
            transition: 0.1s;
        }

        #btn:hover {
            background: #FF6347;
        }

        #show {
            background: #394867;
            color: white;
            transition: 0.2s;
        }

        #show:hover {
            background: #212A3E;
        }

        /* Sidebar */
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
                font-weight: bold;
                font-size: 1.8rem;
                padding: 15px 20px;
                color: black;
                text-align: center;
            }

            .sidebar .navbar-brand span {
                color: white;
            }

            .sidebar .navbar-brand:hover {
                color: white;
            }

            .sidebar .nav-link {
                display: block;
                padding: 10px 20px;
                font-size: 1.2rem;
                color: white;
            }

            .sidebar .nav-link:hover {
                background-color: #ffffff;
                color: black;
            }

        #hero {
        background-image: url(storage/public/images/transaksi.jpg);
        height: 60vh;
        width: 100%;
        background-size: cover;
        background-position: top 25% right 0;
        padding: 0 330px;
        justify-content: center;
        align-items: center; 
        display: flex;
        flex-direction: column;
        color: black;
        text-align: center;
    }

    #hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height:60vh;
    background-color: rgba(0, 0, 0, 0.2); 
    z-index: 1; 

    }

    #hero h3 {
        position: absolute;
        font-size: 80px;
        z-index: 2; /* Agar teks muncul di atas overlay */
    }
   
    .transaksi-list {
            padding: 0 80px 0 300px;
        }

    #list-transaksi {
            padding: 0 0 0 200px;
        }

    #title {
        color: white;
        font-weight: 700;
        padding-left: 250px
    }

    #card {
        background-color: white;
    }

    .table {
    background-color: rgba(255, 255, 255, 0.1); 
    backdrop-filter: blur(10px); 
    border-radius: 10px; 
    border: 1px solid rgba(255, 255, 255, 0.3); 
    }

    .table thead {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
    border-radius: 10px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
    }

    .table tbody tr {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(3px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .table td {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
   
    }

    .table th {
    background-color: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(5px);
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    #btn{
        color: white;
        border: none;
        margin-bottom: 10px;
        transition: 0.2s;
    }

    #btn:hover{
        color: white;
        background: black;
    }

    #show {
        background: #394867;
        color: white;
        transition: 0.2s;
        border:none;
    }

    #show:hover {
        background: #212A3E;
        border:none;
    }

    #edit {
        color: white;
        background-color: #6A5ACD;
        transition: 0.2s;
        border:none;
    }

    #edit:hover {
        background-color: #4B0082;
        border: none;
    }


    #hapus {
        color: white;
        background: #FF7F50;
        transition: 0.2s;
        border:none;
        
    }

    #hapus:hover {
        border: none;
        background: #FF6347;
    }

</style>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent" id="navbar">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="{{ route('products.index') }}">5th <span>Apparel</span></a>
        <a class="nav-link" href="{{ route('products.index') }}">Product</a>
        <a class="nav-link" href="{{ route('suppliers.index') }}">Supplier</a>
        <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a>
    </div>

    <section id="hero">
        <h3 id="title">TRANSAKSI</h3>
    </section>

    <section class="transaksi-list">
        <h3>Your Transaction List</h3>
    </section>

<div class="container mt-5" id="list-transaksi">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ url('transaksi/create')}}" class="btn btn-md" id="btn">ADD TRANSACTION</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th id="id">ID</th>
                                <th id="tanggal">Tanggal</th>
                                <th id="total">Total</th>
                                <th id="status">Status</th>
                                <th id="aksi">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($transaksi as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->tanggal_transaksi }}</td>
                            <td>Rp{{ number_format($t->total, 2, ',', '.') }}</td>
                            <td>
                                <span>{{ $t->statusPemesanan->status_pemesanan }}</span>
                            </td>
                            <td>
                                <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm" id="show">Lihat</a>
                                <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm" id="edit">Edit</a>
                                <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-sm" id="hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                                <div class="alert alert-danger">
                                    Data Transaksi belum Tersedia.
                                </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
       document.addEventListener("DOMContentLoaded", function () {
        new TypeIt("#title", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt(".transaksi-list", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#id", {
        strings: [],
        speed: 100
        }).go();

        new TypeIt("#tanggal", {
        strings: [],
        speed: 100
        }).go();

        new TypeIt("#total", {
        strings: [],
        speed: 100
        }).go();

        new TypeIt("#status", {
        strings: [],
        speed: 100
        }).go();

        new TypeIt("#aksi", {
        strings: [],
        speed: 100
        }).go();

    });
</script>

</body>
</html>
