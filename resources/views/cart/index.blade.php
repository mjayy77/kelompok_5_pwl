<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Your Cart</h3>

        @if(empty($cart))
            <div class="alert alert-warning" role="alert">
                Your cart is empty.
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Final Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                        $totalSaving = 0;
                    @endphp

                    @foreach($cart as $item)

                    @php 
                        $subtotal = $item['final_price'] * $item['quantity'];
                        $total += $subtotal;
                        $saving = ($item['price'] * $item['quantity'])-$subtotal;
                        $totalSaving += $saving;
                    @endphp
                        <tr>
                            <td><img src="{{ 'storage/public/images/' . $item['image'] }}"></td>
                            <td>{{ $item['title'] }}</td>
                            <td>Rp {{ number_format($item['price'], 2, ',', '.') }}</td>
                            <td>{{ $item['discount'] }}%</td>
                            <td>Rp {{ number_format($item['final_price'], 2, ',', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp {{ number_format($subtotal, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4>Grand Total: Rp {{ number_format($total, 2, ',', '.') }}</h4>
            <p>You saved: Rp {{ number_format($totalSaving, 2, ',', '.') }}</p>
        @endif

        <a href="{{ route('home.index') }}" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
