<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>5th Apparel</title>
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

        #hero {
            position: relative;
            height: 60vh;
            width: 100%;
            overflow: hidden;
            margin-bottom: 25px;
        }

        #hero .carousel-item img {
            height: 60vh;
            object-fit: cover;
            filter: brightness(65%);
        }

        #hero .carousel-caption {
            position: absolute;
            bottom: 20%;
            left: 10%;
            right: 10%;
            text-align: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            z-index: 10;
        }

        #hero .carousel-caption h3 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            font-family: "Poppins", sans-serif;
        }

        #hero .carousel-caption p {
            font-size: 1.2rem;
            font-weight: 300;
            margin: 0 auto;
            max-width: 70%;
            font-family: "Poppins", sans-serif;
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            z-index: 10;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(255, 99, 71, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            background-size: 100%;
            background-color: transparent;
            filter: invert(1);
        }

        .carousel-control-prev {
            left: 30px;
        }

        .carousel-control-next {
            right: 30px;
        }

        @media (max-width: 768px) {
            #hero .carousel-caption h3 {
                font-size: 1.8rem;
            }
            #hero .carousel-caption p {
                font-size: 1rem;
            }
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
            font-size: 1.2rem;
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
    <x-navbar-user />

    <!-- Scrollbar -->
    <x-scrollbar />
    
    <section id="hero">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($products as $key => $product)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ 'storage/public/images/' . $product->image }}" class="d-block w-100" alt="{{ $product->title }}" style="height: 60vh; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ $product->title }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    
    <!-- Product List Section -->
    <section id="list-product">
        <div class="container">
            <div class="product-grid" >
                @foreach($products as $product)
                <div class="product-card" onclick="window.location='{{ route('home.show', $product->id) }}'" style="cursor: pointer;">
                    <img src="{{ 'storage/public/images/' . $product->image }}" alt="Product Image">
                    <div class="card-body">
                        <h3 class="product-title">{{ $product->title }}</h3>
                        <p class="product-price">Rp. {{ number_format($product->final_price, 2, ',', '.') }}</p>
                        <p class="product-stock">Stock: {{ $product->stock }}</p>
                    </div>
                </div>
                @endforeach
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
