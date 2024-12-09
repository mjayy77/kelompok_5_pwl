<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Suppliers</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,300;0,400;1,300;1,500;1,800;1,900&family=Poppins:wght@400;600&family=Rancho&display=swap');
        body {
            background: #DDDDDD
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
            background-color: #b70000;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
        }

        .btn-warning:hover {
            background-color: #FF6347;
            color: white;
        }
        .text-add {
            color: #ff6347;
        }

        .text-supplier {
            color: #000000;
        }
    </style>
</head>

<body>
<x-scrollbar />
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">
                    Edit Supplier
                </h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Supplier</label>
                                <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier"
                                    value="{{ old('nama_supplier', $supplier->nama_supplier) }}" placeholder=" " id="nama_supplier">

                                @error('nama_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Alamat Supplier</label>
                                <textarea class="form-control @error('alamat_supplier') is-invalid @enderror"
                                    name="alamat_supplier" rows="3" placeholder=" " id="alamat_supplier">{{ old('alamat_supplier', $supplier->alamat_supplier) }}</textarea>

                                @error('alamat_supplier')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PIC Supplier</label>
                                <textarea class="form-control @error('pic_supplier') is-invalid @enderror"
                                    name="pic_supplier" rows="3" placeholder=" " id="pic_supplier">{{ old('pic_supplier', $supplier->pic_supplier) }}</textarea>

                                @error('pic_supplier')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">No HP PIC Supplier</label>
                                <input type="text" class="form-control @error('no_hp_pic_supplier') is-invalid @enderror"
                                    name="no_hp_pic_supplier" value="{{ old('no_hp_pic_supplier', $supplier->no_hp_pic_supplier) }}" placeholder=" " id="no_hp_pic_supplier">

                                @error('no_hp_pic_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new TypeIt(".title", { speed: 50 }).go();

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

            typePlaceholder(document.getElementById("nama_supplier"), "Masukkan Nama Supplier", 100);
            typePlaceholder(document.getElementById("alamat_supplier"), "Masukkan Alamat Supplier", 100);
            typePlaceholder(document.getElementById("pic_supplier"), "Masukkan Nama PIC Supplier", 100);
            typePlaceholder(document.getElementById("no_hp_pic_supplier"), "Masukkan No HP PIC Supplier", 100);
        });
    </script>
</body>
</html>
