<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
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
        h3 {
            font-weight: bold;
            padding: 0;
            margin: 0;
        }
        #hero {
            background-image: url(storage/public/images/hero4.png);
            height: 90vh;
            width: 100%;
            background-size: cover;
            background-position: top 25% right 0;
            padding: 0 0 0 330px;
            justify-content: center;
            align-items: flex-start;
            display: flex;
            flex-direction: column;
            color: black;
        }
        #hero h2 {
            font-weight: 700;
            font-size: 50px;
            color: #FF6347;
        }
        .panels {
            padding: 0 80px 0 300px;
        }
        .container {
            padding: 20px;
            margin-bottom: 35px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 100vh;
            height: fit-content;
            margin-left: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card:hover{
            box-shadow: 0 5px 10px rgba(255, 99, 71, 0.5);
        }
        .card h5 {
            margin: 0 0 20px 0;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card p {
            font-size: 1.2rem;
        }
        .transaksi {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .canceled {
            color: #dc3545;
        }
        .text-success {
            color: #28a745;
        }
        .text-danger {
            color: #dc3545;
        }
        ul {
            list-style-type: square;
        }
    </style>
</head>
<body>
<x-navbar />
<x-sidebar />
<x-scrollbar />
    <section id="hero">
        <h2 id="typing1">Welcome, {{ Auth::user()->name }}!</h2>
        <p id="typing2">Here is your admin dashboard.</p>
    </section>

    <section class="panels">
        @if(!$lowStockItems->isEmpty())
        <div class="container">
            <h3>Need Action</h3>
            <p>Need Your Attention Quickly</p>
            <hr>
            <div class="row">
                <div class="card" onclick="window.location='{{ route('products.index') }}'" style="cursor: pointer;">
                    <h5>Low Stock Items</h5>
                    <ul>
                        @foreach($lowStockItems as $item)
                            <li><strong>{{ $item->title }}</strong> - Stock: {{ $item->stock }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <div class="container">
            <h3>This Month</h3>
            <p>Your Recap For This Month</p>
            <hr>
            <div class="row">
                <div class="card" onclick="window.location='{{ route('products.index') }}'" style="cursor: pointer;">
                    <h5>New Products</h5>
                    <p>{{ $newProducts }}</p>
                </div>
                <div class="card" onclick="window.location='{{ route('suppliers.index') }}'" style="cursor: pointer;">
                    <h5>New Suppliers</h5>
                    <p>{{ $newSuppliers }}</p>
                </div>
                <div class="card" onclick="window.location='{{ route('transaksi.index') }}'" style="cursor: pointer;">
                    <h5>This Month Transactions</h5>
                    <div class="col md-3 transaksi">
                        <div class="on-process"><p><strong>On Process:</strong> {{ $statusCounts['On Process'] }}</p></div>
                        <div class="arrived"><p><strong>Arrived:</strong> {{ $statusCounts['Arrived'] }}</p></div>
                    </div> 
                    <div class="col md-3 transaksi">
                        <div class="delivered"><p><strong>Delivered:</strong> {{ $statusCounts['Delivered'] }}</p></div>
                        <div class="canceled"><p><strong>Canceled:</strong> {{ $statusCounts['Canceled'] }}</p></div>
                    </div>
                </div>
                <div class="card">
                    <h5>This Month Revenue</h5>
                    <p>Rp {{ number_format($monthlyRevenue, 2, ",", ".") }} 
                    <span class="{{ $revenueChangeClass }}">({{ $percentageSign }}{{ $formattedPercentage }}%)</span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="panels">
        <div class="container">
            <h3>Overall</h3>
            <p>Your Overall Recap</p>
            <hr>
            <div class="row">
                <div class="card" onclick="window.location='{{ route('products.index') }}'" style="cursor: pointer;">
                    <h5>Products</h5>
                    <p>{{ $productCount }}</p>
                </div>
                <div class="card" onclick="window.location='{{ route('suppliers.index') }}'" style="cursor: pointer;">
                    <h5>Suppliers</h5>
                    <p>{{ $supplierCount }}</p>
                </div>
                <div class="card" onclick="window.location='{{ route('transaksi.index') }}'" style="cursor: pointer;">
                    <h5>Transactions</h5>
                    <div class="col md-3 transaksi">
                        <div class="on-process"><p><strong>On Process:</strong> {{ $statusCountsOverall['On Process'] }}</p></div>
                        <div class="arrived"><p><strong>Arrived:</strong> {{ $statusCountsOverall['Arrived'] }}</p></div>
                    </div> 
                    <div class="col md-3 transaksi">
                        <div class="delivered"><p><strong>Delivered:</strong> {{ $statusCountsOverall['Delivered'] }}</p></div>
                        <div class="canceled"><p><strong>Canceled:</strong> {{ $statusCountsOverall['Canceled'] }}</p></div>
                    </div>
                </div>

                <div class="card">
                    <h5>Total Revenue</h5>
                    <p>Rp {{ number_format($totalRevenue, 2, ",", ".") }}</p>
                </div>
            </div>
        </div>
    </section>                    

    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new TypeIt("#typing1", {
            strings: [],
            speed: 40
            }).go();

            new TypeIt("#typing2", {
            strings: [],
            speed: 60
            }).go();
        });

        const navbar = document.getElementsByTagName('nav')[0];
        window.addEventListener('scroll', function() {
            if (window.scrollY > 1) {
                navbar.classList.replace('bg-transparent', 'nav-color')
            } else if (this.window.scrollY <= 0) {
                navbar.classList.replace('nav-color', 'bg-transparent')
            }
        });
    </script>
</body>
</html>