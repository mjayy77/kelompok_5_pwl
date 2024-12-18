<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Metode Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap');
    body {
        font-family: 'Kanit', sans-serif;
        background: #F5F5F5;
    }
    .container {
        margin-top: 50px;
        max-width: 600px;
    }
    .card {
        padding: 20px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
        background-color: #10375C;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
<body>
    <div class="container">
        <div class="card">
            <h3 class="text-center mb-4">Edit Metode Pembayaran</h3>
            <form action="{{ route('metodePembayarans.update', $metodePembayarans->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_metode" class="form-label">Nama Metode Pembayaran</label>
                    <input type="text" id="nama_metode" name="nama_metode" class="form-control @error('nama_metode') is-invalid @enderror" value="{{ old('nama_metode', $metodePembayarans->nama_metode) }}" required>
                    @error('nama_metode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $metodePembayarans->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('metodePembayarans.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
