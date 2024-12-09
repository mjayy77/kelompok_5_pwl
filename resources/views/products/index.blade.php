<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Products</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
          font-family: "Poppins", sans-serif;
        }

        /* Style for hero section */
        #hero {
            background-image: url(storage/public/images/products.png);
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
            z-index: 2;
            color: white;
            font-weight: 700;
            padding-left: 250px
        }

        #list-product {
            padding: 50px 80px 0 300px;
        }

        #our-product {
            font-weight: bold;
            padding: 20px 0;
        }
       
        /* Card styling */
        .product-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 10px rgba(255, 99, 71, 0.5);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 10px;
        }

        .product-card .product-title {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .product-card .product-price {
            font-size: 1rem;
            color: #FF6347;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .product-card .product-stock {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Grid layout for products */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        @media (min-width: 992px) {
            .product-grid {
                grid-template-columns: repeat(4, 1fr); /* 4 columns */
            }
        }

    /* Button */
    #btn {
        background: #10375C;
        color: white;
        transition: 0.1s;
    }

    #btn:hover {
        background: #FF6347;
    }
    
    #edit {
        color: white;
        background-color: #6A5ACD;
        t,ransition: 0.2s;
        margin-left:10px;
        transition: 0.2s;
    }

    #edit:hover {
        background-color: #4B0082;
        border: none;
    }

    #hapus {
        color: white;
        background: #FF7F50;
        transition: 0.2s;
        margin-left: 10px;
        
    }

    #hapus:hover {
        border: none;
        background: #FF6347;
    }
    </style>
</head>
<body>

    <!-- Navbar -->
    <x-navbar />

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Scrollbar -->
    <x-scrollbar />
    
    <section id="hero">
        <h3 id="title">PRODUCTS</h3>
    </section>
    
    <!-- Product List Section -->
    <section id="list-product">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 id="our-product">Your Products</h3>
                <a href="{{ route('products.create') }}" class="btn btn-md font-semibold" id="btn">ADD PRODUCT</a>
            </div>
            <div class="product-grid" >
                @forelse($products as $product)
                <div class="product-card" onclick="window.location='{{ route('products.show', $product->id) }}'" style="cursor: pointer;">
                    <img src="{{ 'storage/public/images/' . $product->image }}" alt="Product Image">
                    <div class="card-body">
                        <h3 class="product-title">{{ $product->title }}</h3>
                        <p class="product-price">Rp. {{ number_format($product->final_price, 2, ',', '.') }}</p>
                        <p class="product-stock">Stock: {{ $product->stock }}</p>

                        <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm " id="edit">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm " id="hapus">HAPUS</button>
                        </form>
                    </div>
                </div>
                @empty
                    <div class="alert alert-danger">
                        Data Produk belum Tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        new TypeIt("#title", {
        strings: [],
        speed: 40
        }).go();

        new TypeIt("#our-product", {
        strings: [],
        speed: 60
        }).go();

    });


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

        const navbar = document.getElementsByTagName('nav')[0];
        window.addEventListener('scroll', function() {
            if (window.scrollY > 1) {
                navbar.classList.replace('bg-transparent', 'nav-color')
            } else if (this.window.scrollY <= 0) {
                navbar.classList.replace('nav-color', 'bg-transparent')
            }
        })

        AOS.init();
    </script>
</body>
</html>
