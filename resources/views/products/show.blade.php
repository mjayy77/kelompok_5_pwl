<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg {
        background: #DDDDDD;
    }

    h3 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

    #card-img  {
        background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    #typing5 p {
    color: white;
    }

    .btn{
        color: black;
        border: 2px solid black;
    }

    .btn:hover {
        background: black;
        color: white;
    }
</style>
<body class="bg">
<x-scrollbar />
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3 style="color: black">Show Product</h3>
            <div class="col-md-4">
                <div class="card border-0 shadow-5m rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/public/images/'.$product->image) }}" class="rounded" style="width: 100%; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);" >
                    </div>
                </div>
            </div>
                <div class="col-md-8">
                    <div class="card border-0 shadow-5m rounded" id="card-img">
                        <div class="card-body">
                            <h3 id="typing">{{ $product->title }}</h3>
                            <hr/>
                            <p id="typing2">Category : {{ $product->product_category_name }}</p>
                            <hr/>
                            <p id="typing3">Supplier : {{ $product->nama_supplier }}</p>
                            <hr/>
                            <p id="typing5">Description : {!! $product->description !!}</p>
                            <hr/>
                            <p id="typing4">Price : {{ "Rp " . number_format($product->price,2,',','.') }}</p>
                            <hr/>
                            <p id="typing7">Discount : {{ $product->discount }}%</p>
                            <hr/>
                            <p id="typing8">Final Price : {{ "Rp " . number_format($product->final_price,2,',','.') }}</p>
                            <hr/>
                            <p id="typing6">Stock : {{ $product->stock }}</p>
                            <hr/>
                            <a href="{{ route('products.index') }}" class="btn">Kembali</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
          document.addEventListener("DOMContentLoaded", function () {
        new TypeIt(document.querySelector('h3'), {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing2", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing3", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing4", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing5", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing6", {
        strings: [],
        speed: 50
        }).go();
        
        new TypeIt("#typing7", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt("#typing8", {
        strings: [],
        speed: 50
        }).go();

        });
    </script>
</body>
</html>