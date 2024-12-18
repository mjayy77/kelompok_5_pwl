<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;1,300;1,500;1,800;1,900&family=Poppins:wght@400;600&family=Rancho&display=swap');
        body {
            background: #DDDDDD;
        }

        .container {
            max-width: 900px;
            margin-top: 2rem;
            margin-bottom: 2rem;
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
            margin-bottom: 20px;
        }

        .text-edit {
            color: #ff6347;
        }

        .text-suppliers {
            color: #000000;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .image-preview {
            width: 100%;
            height: auto;
            margin-bottom: 15px;
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
            background-color: #FF7F50;
            border-color: #ffc107;
            color: #FFFFFF;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
        }

        .btn-warning:hover {
            background-color: #FF6347;
            color: #FFFFFF;
            border: none;
        }

        .alert-danger {
            font-size: 12px;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<x-scrollbar />
<div class="container mt-5 mb-5">
        <h4>Edit Product</h4>
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <!-- Image preview -->
                    <img src="{{ $data['category']->image ? asset('storage/public/images/' . $data['category']->image) : 'mug.jpeg' }}" class="image-preview" id="imagePreview" alt="Category Image">
                </div>
                <div class="col-md-6">
                    <form action="{{ route('categories.update', $data['category']->id) }}" method="POST" enctype="multipart/form-data" id="productsForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">IMAGE</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="imageInput" accept="image/*">
                            
                            <!-- error message untuk image -->
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">CATEGORY NAME</label>
                            <input type="text" class="form-control @error('product_category_name') is-invalid @enderror" name="product_category_name" value="{{ old('product_category_name', $data['category']->product_category_name) }}" placeholder="Masukkan Judul Product">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">DESCRIPTION</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" id="descriptionEditor" placeholder="Masukkan Deskripsi Product">{{ old('description', $data['category']->description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                        <button type="button" class="btn btn-md btn-warning" onclick="resetform()">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new TypeIt(".title", {
            strings: [],
            speed: 50
            }).go();
        });

        document.getElementById('imageInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            }
        });

        function resetform() {
            document.getElementById('categoriesForm').reset();
            document.getElementById('imagePreview').src = "{{ $data['category']->image ? asset('storage/' . $data['category']->image) : 'mug.jpeg' }}";
        }
    </script>
</body>
</html>