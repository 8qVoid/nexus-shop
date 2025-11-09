<!DOCTYPE html>
<html>
<head>
    <title>Order Failed</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: red; }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #ff6666; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold; }
        a:hover { background: #ff4d4d; }
    </style>
</head>
<body>
    <h1>❌ Payment Failed for Order #{{ $order->id }}</h1>

    <p>Sorry <strong>{{ $order->customer_name }}</strong>, your payment did not go through.</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>

    <a href="{{ url('/cart') }}">Back to Cart</a>
</body>
</html>
