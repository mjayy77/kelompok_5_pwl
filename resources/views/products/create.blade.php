<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
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
        }

        .btn-primary:hover {
            background-color: #555;
            color: #FFFFFF;
            border: none;
        }

        .btn-warning {
            font-weight: bold;
            padding: 10px 20px;
            border: none;
        }

        .btn-primary:hover {
            border: none;
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

    <div class="container mt-5 mb-5">
        <h4>Add Product</h4>
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <!-- Image preview -->
                    <img src="" class="image-preview" id="imagePreview" alt="Product Image">
                </div>
                <div class="col-md-6">
                <form id="productsForm" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">IMAGE</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput" accept="image/*">
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_product_id">Product Category</label>
                            <select class="form-control" id="category_product_id" name="category_product_id">
                                <option value="">-- Select Category Product --</option>
                                @foreach ($data['categories'] as $c)
                                    <option value="{{$c->id}}">{{$c->product_category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="supplier_id">Supplier</label>
                            <select class="form-control" id="supplier_id" name="supplier_id">
                                <option value="">-- Select Supplier --</option>
                                @foreach ($data['suppliers'] as $s)
                                    <option value="{{$s->id}}">{{$s->nama_supplier}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">TITLE</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Masukan Judul Product">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">DESCRIPTION</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukan Deskripsi Product"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">PRICE</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Masukan Price Product">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">DISCOUNT</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="discount" placeholder="Masukan Discount Product">
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">STOCK</label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" placeholder="Masukan Stock Product">
                                </div>
                            </div>
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
