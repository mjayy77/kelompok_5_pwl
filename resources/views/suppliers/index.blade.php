<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Suppliers</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<style>
    body {
          font-family: "Poppins", sans-serif;
          background: #DDDDDD;
        }

        #hero {
        background-image: url(storage/public/images/suppliers.jpg);
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
   
    .supplier-list {
        padding: 50px 80px 0 300px;
    }

    #supplier-list {
        font-weight: bold;
    }

    #list-supplier {
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

    #type5 {
    text-align: center;
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
        margin-top:3px;
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
        margin-top: 3px;
        border:none;
        
    }

    #hapus:hover {
        border: none;
        background: #FF6347;
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
        <h3 id="title">SUPPLIERS</h3>
    </section>

    <section class="supplier-list">
        <h3 id="supplier-list">Your Suppliers List</h3>
    </section>

    <div class="container mt-5" id="list-supplier">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded" id="card">
                    <div class="card-body" >
                        <a href="{{ route('suppliers.create') }}" class="btn btn-md  mb-3" id="btn">ADD SUPPLIER</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" id="type1">Nama Supplier</th>
                                    <th scope="col" id="type2">Alamat Supplier</th>
                                    <th scope="col" id="type3">PIC SUPPLIER</th>
                                    <th scope="col" id="type4">No Hp PIC Supplier</th>
                                    <th scope="col" style="width: 20%" id="type5">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->nama_supplier }}</td>
                                    <td>{{ $supplier->alamat_supplier }}</td> 
                                    <td>{{ $supplier->pic_supplier }}</td>
                                    <td>{{ $supplier->no_hp_pic_supplier }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ?')">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-dark" id="show">SHOW</a><br>
                                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-primary" id="edit">EDIT</a><br>
                                            <button type="submit" class="btn btn-sm btn-danger" id="hapus">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Suppliers belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $suppliers->links() }}
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

        new TypeIt("#type1", {
        strings: [],
        speed: 200
        }).go();

        new TypeIt("#type2", {
        strings: [],
        speed: 200
        }).go();

        new TypeIt("#type3", {
        strings: [],
        speed: 200

        }).go();
        new TypeIt("#type4", {
        strings: [],
        speed: 200
        }).go();

        new TypeIt("#type5", {
        strings: [],
        speed: 200
        }).go();

        new TypeIt("#supplier-list", {
        strings: [],
        speed: 50
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