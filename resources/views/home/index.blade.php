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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
          font-family: "Poppins", sans-serif;
        }

        #hero {
            padding-top: 80px;
            position: relative;
            height: 420px;
            width: 100%;
            overflow: hidden;
            margin-bottom: 25px;
        }

        #hero .carousel-item img {
            height: 340px;
            width: 100%;
            object-fit: cover;
            
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

        .carousel-item {
            height: 340px;
            width: 100%;
            background: #777;
            color: white;
            position: relative
        }

        .carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 40%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    background-color: #ffff; /* Warna hitam untuk background tombol */
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
    z-index: 10;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    background-color: #FF6347; /* Warna orange saat hover */
    transform: translateY(-50%) scale(1.1);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
    background-size: 100%;
    background-color: transparent;
    filter: invert(1); /* Ikon berwarna putih */
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

    .card-container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    
    padding: 20px;
    background-color: #f8f9fa;
    }

    .card {
        margin: 10px;
        width: 150px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 15px;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-image {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        border-radius: 50%;
        background-color: #f2f2f2;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .card-image img {
        max-width: 80%;
        max-height: 80%;
    }

    .card-text {
        margin-top: 10px;
        font-size: 14px;
        font-weight: bold;
        color: #ffff;
        background: #FF6347;
        border-radius: 10px;
        padding: 5px;
    }

    .container h1 span {
        color:#FF6347;
    }

    
    .pagination .page-item.active .page-link {
    background-color: #FF6347; /* Hijau untuk tombol aktif */
    color: white;
    border:none;
    }

    .pagination .page-item .page-link {
    color:#FF6347 ;

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
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('storage/public/images/Frame 1.jpg') }}" class="d-block w-100" alt="Gambar 1" style="height: 240; object-fit: cover; width: 1117;">
                <div class="carousel-caption d-none d-md-block">
                 
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('storage/public/images/Frame 2.jpg') }}" class="d-block w-100" alt="Gambar 2" style="height: 240; object-fit: cover; width: 1117;">
                <div class="carousel-caption d-none d-md-block">
                   
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{asset('storage/public/images/Frame 3.jpg') }}" class="d-block w-100" alt="Gambar 3" style="height: 240; object-fit: cover; width: 1117;">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
            </div>
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

<section id="category-product">
    <div class="container">
        <h3 style="text-align: center;">Category Product</h3>
    </div>
</section>

<section id="card">
    <div class="card-container">
        <div class="card">
            <div class="card-image">
                <img src="{{asset('storage/public/images/jacket.jpg') }}" alt="Skin Care">
            </div>
            <div class="card-text">Jacket</div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="{{asset('storage/public/images/t-shirt.jpg') }}" alt="Laptop & PC">
            </div>
            <div class="card-text">T-shirt</div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="{{asset('storage/public/images/saitama.jpg') }}" alt="Smartphone">
            </div>
            <div class="card-text">Hoodie</div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="{{asset('storage/public/images/sweater.jpg') }}" alt="Fashion">
            </div>
            <div class="card-text">Sweater</div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="{{asset('storage/public/images/kemeja.jpg') }}" alt="Fashion">
            </div>
            <div class="card-text">Shirt</div>
        </div>
        
    </div>

</section>

    
    <!-- Product List Section -->
    <section id="list-product">
    
        
        <div class="container">
            <h1 style="text-align: center; margin-top: 30px; font-weight: 700; margin-bottom:20px;">Our <span>Product</span></h1>
            {{ $products->links('pagination::bootstrap-5') }}


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
