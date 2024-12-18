<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Category</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;1,300;1,500;1,800;1,900&family=Poppins:wght@400;600&family=Rancho&display=swap');
        .bg {
            background: #DDDDDD;
        }

        .container {
            max-width: 900px;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        h3 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .btn {
            color: black;
            border: 2px solid black;
            background-color: ##FF7F50;
        }

        .btn:hover {
            color: black;
            background: #FF6347;
        }

        .btn-danger {
            color: black;
            border: 2px solid black;
            background: white;
        }

        .btn-danger:hover {
            color: rgb(252, 252, 252);
            background: rgb(171, 0, 0);
        }
</style>

<body class="bg">
<x-scrollbar />
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3 id="type">Product Category</h3>
            <hr>
            <div class="col-md-4">
                <div class="card border-0 shadow-5m rounded">
                </div>
            </div>
            <div>
                <div class="card border-0 shadow-5m rounded" id="card">
                    <div class="card-body">
                        <h3 class="type1">{{ $category->product_category_name }}</h3>
                        <hr/>
                        <p id="typing2">{{ $category->description }}</p>
                        <a href="{{ route('categories.index') }}" class="btn">Kembali</a>
                        <!-- <a href="{{ route('categories.destroy', $category->id) }}" 
                           class="btn btn-danger" 
                           onclick="event.preventDefault(); 
                           document.getElementById('delete-form').submit();">
                           Hapus
                        </a> -->

                        <form id="delete-form" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new TypeIt("#type", {
                strings: [],
                speed: 50
            }).go();

            new TypeIt(".type1", {
                strings: [],
                speed: 50
            }).go();

            new TypeIt("#typing2", {
            strings: [],
            speed: 50
            }).go();
        });
    </script>
</body>
</html>
