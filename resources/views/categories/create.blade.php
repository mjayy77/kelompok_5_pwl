<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Category</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;1,300;1,500;1,800;1,900&family=Poppins:wght@400;600&family=Rancho&display=swap');
        body {
            background: #DDDDDD;
        }

        /* Container styling */
        .container {
            max-width: 900px;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Card styling */
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h3 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            font-weight: bold;
            color: #333;
        }

        /* Form controls */
        .form-control {
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Primary button styling */
        .btn-primary {
            background-color: #333;
            border-color: #333;
            color: #FFFFFF;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
        }

        /* Hover effect for primary button */
        .btn-primary:hover {
            background-color: #555;
            color: #FFFFFF;
            border: none;
        }

        /* Form group margin */
        .form-group {
            margin-bottom: 15px;
        }

        /* Image preview styling */
        .image-preview {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        /* Additional styling if required */
        .btn-warning {
            color: #ffffff;
            background-color: #f0ad4e;
            font-weight: bold;
            padding: 10px 20px;
        }

        .btn-warning:hover {
            background-color: #ec971f;
        }
        .text-add {
            color: #ff6347;
        }
    </style>
</head>
<x-scrollbar />
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Add Category</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="supplierForm" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label>Kategori Produk</label>
                                <input type="text" class="form-control @error('product_category_name') is-invalid @enderror" id="product_category_name" name="product_category_name" placeholder=" ">
                                @error('product_category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukan Deskripsi Product"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script>
        // Combined DOMContentLoaded listener
        document.addEventListener("DOMContentLoaded", function () {
            // TypeIt animation for title
            new TypeIt(".title", {
                strings: [],
                speed: 50
            }).go();

            function typePlaceholder(element, text, speed) {
                let index = 0;
                function type() {
                    if (index < text.length) {
                        element.setAttribute('placeholder', element.getAttribute('placeholder') + text.charAt(index));
                        index++;
                        setTimeout(type, speed);
                    }
                }
                element.setAttribute('placeholder', ''); 
                type();
            }

            typePlaceholder(document.getElementById("product_category_name"), "Masukkan Kategori Produk", 100);
        });
    </script>
</body>

</html>