<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaction</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>

<style>
    body {
          font-family: "Poppins", sans-serif;
          background: #DDDDDD;
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
        padding: 50px 80px 0 300px;
    }

    #transaksi-list {
        font-weight: bold;
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

    #aksi {
        text-align: center;
    }

</style>
<body>
    <!-- Navbar -->
    <x-navbar />

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Scrollbar -->
    <x-scrollbar />

    <section id="hero">
        <h3 id="title">TRANSAKSI</h3>
    </section>

    <section class="transaksi-list">
        <h3 id="transaksi-list">Your Transaction List</h3>
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
                                <th id="aksi">ACTIONS</th>
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
                            <td class="text-center">
                                <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ?')">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-sm btn-dark" id="show">SHOW</a>
                                    <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-sm btn-primary" id="edit">EDIT</a>
                                    <button type="submit" class="btn btn-sm btn-danger" id="hapus">HAPUS</button>
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

        new TypeIt("#transaksi-list", {
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

    const navbar = document.getElementsByTagName('nav')[0];
        window.addEventListener('scroll', function() {
            if (window.scrollY > 1) {
                navbar.classList.replace('bg-transparent', 'nav-color')
            } else if (this.window.scrollY <= 0) {
                navbar.classList.replace('nav-color', 'bg-transparent')
            }
        })
        
    // message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'BERHASIL',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'GAGAL',
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>

</body>
</html>
