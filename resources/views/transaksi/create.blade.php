<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Transaction</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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

        h4 {
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
            margin: 10px 0;
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

    #add-detail {
        background: #10375C;
        color: white;
        transition: 0.1s;
        margin-bottom: 10px;
        border: none
    }

    #add-detail:hover {
        background: darkslategrey;
        color: white;
        border: none;
    }

    #simpan {
        color: black;
        background-color: #FF7F50;
        transition: 0.2s;
        border:none;
    }

    #simpan:hover {
        background-color: #FF6347;
        border: none;
    }

    #hapus {
        color: white;
        background: #b70000;
        transition: 0.2s;
        border:none;
        
    }

    #hapus:hover {
        border: none;
        background: #980000;
    }

</style>
<body>
<x-scrollbar />
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Add Transaction</h3>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" class="form-control" id="tanggal" required>
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                    <input type="email" class="form-control @error('email_pembeli') is-invalid @enderror" id="email_pembeli" name="email_pembeli" placeholder="Masukkan Email Anda">
                        @error('email_pembeli')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
            </div>

            <div class="form-group mb-3">
                <label>Status Pemesanan</label>
                <select name="status_pemesanan_id" class="form-control" required>
                    <option value="">Pilih Status Pemesanan</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status_pemesanan }}</option>
                        @endforeach
                </select>
            </div>

            <h4 class="mt-4">Detail Transaksi</h4>
            <div id="details">
                <div class="detail-item mb-3">
                    <div class="row">
                        <div class="col">
                            <label>Product</label>
                            <select name="details[0][product_id]" class="form-control" required>
                                <option value="">Pilih Produk</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="metode_pembayaran_id">Metode Pembayaran</label>
                            <select name="metode_pembayaran_id" id="metode_pembayaran_id" class="form-control" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                @foreach($metodePembayarans as $metode)
                                    <option value="{{ $metode->id }}">{{ $metode->name }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="col">
                            <label>Jumlah Pembelian</label>
                            <input type="number" name="details[0][jumlah_pembelian]" class="form-control" min="1" required>
                        </div>
                        <div class="col-1">
                            <label></label>
                            <button type="button" id="add-detail" class="btn">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="simpan" class="btn">Simpan</button>
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
        new TypeIt(".title", {
        strings: [],
        speed: 50
        }).go();

    });
    let detailIndex = 1;

    document.getElementById('add-detail').addEventListener('click', function() {
        let details = document.getElementById('details');
        let newDetail = document.createElement('div');
        newDetail.classList.add('detail-item', 'mb-3');
        newDetail.innerHTML = `
            <div class="row">
                <div class="col">
                    <label>Product</label>
                    <select name="details[${detailIndex}][product_id]" class="form-control" required>
                        <option value="">Pilih Produk</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="metode_pembayaran_id">Metode Pembayaran</label>
                    <select name="metode_pembayaran_id" id="metode_pembayaran_id" class="form-control">
                    @foreach($metodePembayarans as $metodePembayaran)
                        <option value="{{ $metodePembayaran->id }}">{{ $metodePembayaran->name }}</option>
                    @endforeach 
                    </select>
                </div>

                <div class="col">
                    <label>Jumlah Pembelian</label>
                    <input type="number" name="details[${detailIndex}][jumlah_pembelian]" class="form-control" min="1" required>
                </div>
                <div class="col-1">
                    <label></label>
                    <button type="button" class="btn remove-detail" id="hapus">Hapus</button>
                </div>
            </div>
        `;
        details.appendChild(newDetail);
        detailIndex++;
    });

    document.getElementById('details').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-detail')) {
            event.target.closest('.detail-item').remove();
        }
    });
</script>
</body>
</html>
