<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .total {
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
        #small {
            font-size: 1em;
            font-weight: normal;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transaction Details</h1>

        <p>Hi,</p>
        <p>Thank you for your purchase! Below are the details of your recent transaction:</p>

        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Original Price</th>
                <th>Discount</th>
                <th>Subtotal</th>
            </tr>
            @foreach ($transaksi->details as $detail)
                <tr>
                    <td>{{ $detail->product->title }}</td>
                    <td>{{ $detail->jumlah_pembelian }}</td>
                    <td>Rp {{ number_format($detail->product->price, 2, ',', '.') }}</td>
                    <td>{{ $detail->discount }}%</td>
                    <td>Rp {{ number_format($detail->final_price * $detail->jumlah_pembelian, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>

        <div class="total">
            <p>Total Amount: Rp {{ number_format($transaksi->total, 2, ',', '.') }}</p>
            <p id="small">Payment Method: {{ $transaksi->metodePembayaran->name }}</p>
        </div>

        <p>Status: <strong>{{ $transaksi->statusPemesanan->status_pemesanan }}</strong></p>

        <p>If you have any questions about your transaction, please contact our support team.</p>

        <p>Thank you for shopping with us!</p>

        <div class="footer">
            <p>Best Regards,</p>
            <p>5th Apparel</p>
        </div>
    </div>
</body>
</html>
