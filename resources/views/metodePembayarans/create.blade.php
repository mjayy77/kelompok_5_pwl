<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Payment Method</title>
    <link rel="icon" href="{{ asset('storage/public/images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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
</style>

<body>
    <x-scrollbar />
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Add Payment Method</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('metodePembayarans.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Payment Method Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
                            </div>

                            <button type="submit" id="simpan" class="btn">Save</button>
                            <a href="{{ route('metodePembayarans.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
