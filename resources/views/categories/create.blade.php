<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Add New Product</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #DDDDDD;
        }

        .container {
            max-width: 900px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        h4 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #333;
            border-color: #333;
            color: #FFFFFF;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            width: fit-content;
        }

        .btn-primary:hover {
            background-color: #555;
            color: #FFFFFF;
            border: none;
        }

        .btn-warning {
            background-color: #FF6347;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            width: fit-content;
        }

        .btn-warning:hover {
            border: none;
            background-color: #980000;
            color: white;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .image-preview {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<x-scrollbar />
    <div class="container mt-5 mb-5">
        <h4>Add Category</h4>
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <!-- Image preview -->
                    <img src="" class="image-preview" id="imagePreview" alt="Product Image">
                </div>
                <div class="col-md-6">
                <form id="productsForm" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">IMAGE</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput" accept="image/*">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">CATEGORY NAME</label>
                            <input type="text" class="form-control @error('product_category_name') is-invalid @enderror" name="product_category_name" placeholder="Masukan Nama Kategori">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">DESCRIPTION</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukan Deskripsi Product"></textarea>
                        </div>

                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                        <button type="button" id="resetBtn" onclick="resetform()" class="btn btn-md btn-warning me-3">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
        new TypeIt(document.querySelector('h4'), {
        strings: [],
        speed: 40
        }).go();

       

         });
         
        document.addEventListener("DOMContentLoaded", function () {
            new TypeIt(".title", {
            strings: [],
            speed: 50
            }).go();
        });

        // Preview image saat user memilih gambar
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            }
        });
    </script>

</body>
</html>
