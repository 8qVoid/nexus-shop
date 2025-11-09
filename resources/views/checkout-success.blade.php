<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed | Nexus Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #0ea5e9;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --success: #10b981;
            --success-light: #a7f3d0;
            --card-bg: rgba(255, 255, 255, 0.85);
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .logo i {
            font-size: 2rem;
        }

        .success-container {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            color: var(--dark);
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .success-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--success), var(--primary));
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--success), var(--primary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }

        .success-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            background: linear-gradient(90deg, var(--success), var(--primary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .order-id {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 30px;
            font-weight: 600;
        }

        .customer-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
            text-align: left;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid var(--primary);
        }

        .info-card h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .info-card h3 i {
            color: var(--primary);
        }

        .info-card p {
            color: var(--gray);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .order-details {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            color: var(--dark);
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
        }

        .order-details h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: var(--dark);
            font-size: 1.5rem;
        }

        .order-details h2 i {
            color: var(--primary);
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .order-table thead {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
        }

        .order-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        .order-table td {
            padding: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .order-table tbody tr {
            transition: var(--transition);
        }

        .order-table tbody tr:hover {
            background: rgba(99, 102, 241, 0.05);
        }

        .order-table tbody tr:last-child td {
            border-bottom: none;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
        }

        .back-to-shop {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 30px auto;
            padding: 16px 32px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            width: fit-content;
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
        }

        .back-to-shop:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
        }

        .confirmation-message {
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 15px;
            color: var(--success);
        }

        .confirmation-message i {
            font-size: 1.5rem;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            color: var(--gray);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .customer-info {
                grid-template-columns: 1fr;
            }

            .order-table {
                display: block;
                overflow-x: auto;
            }

            .success-title {
                font-size: 2rem;
            }

            .logo {
                font-size: 1.5rem;
            }
        }

        .celebrate {
            animation: celebrate 2s ease-in-out;
        }

        @keyframes celebrate {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-cube"></i>
                <span>NEXUS SHOP</span>
            </div>
        </header>

        <div class="success-container celebrate">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h1 class="success-title">Order Confirmed!</h1>
            <p class="order-id">Order #{{ $order->id }}</p>

            <div class="confirmation-message">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Confirmation sent to {{ $order->customer_email }}</strong>
                    <p>We've sent your order details and receipt to your email address.</p>
                </div>
            </div>

            <div class="customer-info">
                <div class="info-card">
                    <h3><i class="fas fa-user"></i> Customer</h3>
                    <p>{{ $order->customer_name }}</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-envelope"></i> Email</h3>
                    <p>{{ $order->customer_email }}</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-phone"></i> Phone</h3>
                    <p>{{ $order->customer_phone }}</p>
                </div>
                <div class="info-card">
                    <h3><i class="fas fa-credit-card"></i> Payment Method</h3>
                    <p>{{ strtoupper($order->payment_method) }}</p>
                </div>
            </div>
        </div>

        <div class="order-details">
            <h2><i class="fas fa-receipt"></i> Order Details</h2>

            <table class="order-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($order->items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->product->name ?? 'Product removed' }}</strong>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>₱{{ number_format($item->price, 2) }}</td>
                        <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">No items found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="order-total">
                <span>Total Amount:</span>
                <span>₱{{ number_format($order->total, 2) }}</span>
            </div>
        </div>

        <a href="{{ url('/') }}" class="back-to-shop">
            <i class="fas fa-shopping-bag"></i>
            Continue Shopping
        </a>

        <footer>
            <p>© 2023 Nexus Shop. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Add celebration effect
        document.addEventListener('DOMContentLoaded', function() {
            const successContainer = document.querySelector('.success-container');

            // Add floating animation to success icon
            const icon = document.querySelector('.success-icon');
            icon.style.animation = 'float 3s ease-in-out infinite';

            // Add styles for floating animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes float {
                    0% { transform: translateY(0px); }
                    50% { transform: translateY(-10px); }
                    100% { transform: translateY(0px); }
                }
            `;
            document.head.appendChild(style);

            // Add confetti effect on load
            setTimeout(createConfetti, 500);
        });

        function createConfetti() {
            const colors = ['#6366f1', '#0ea5e9', '#10b981', '#f59e0b', '#ef4444'];
            const container = document.querySelector('.success-container');

            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = '8px';
                confetti.style.height = '8px';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.borderRadius = '50%';
                confetti.style.top = '0';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.opacity = '0.7';
                confetti.style.zIndex = '1';
                container.appendChild(confetti);

                // Animate confetti
                const animation = confetti.animate([{
                        transform: 'translateY(0) rotate(0deg)',
                        opacity: 1
                    },
                    {
                        transform: `translateY(${container.offsetHeight}px) rotate(${Math.random() * 360}deg)`,
                        opacity: 0
                    }
                ], {
                    duration: 1000 + Math.random() * 2000,
                    easing: 'cubic-bezier(0.1, 0.8, 0.3, 1)'
                });

                // Remove confetti after animation
                animation.onfinish = () => confetti.remove();
            }
        }
    </script>
</body>

</html>