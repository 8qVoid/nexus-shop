<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Nexus Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #0ea5e9;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --danger: #ef4444;
            --danger-dark: #dc2626;
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

        .cart-title {
            text-align: center;
            margin: 30px 0;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .cart-container {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            color: var(--dark);
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .cart-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .cart-item img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-details h3 {
            margin: 0 0 8px;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
        }

        .cart-item-details p {
            margin: 0;
            color: var(--gray);
            font-size: 1.1rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            margin-top: 10px;
            gap: 10px;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--primary-dark);
            transform: scale(1.1);
        }

        .quantity-btn:disabled {
            background: var(--gray);
            cursor: not-allowed;
            transform: none;
        }

        .quantity {
            font-weight: 600;
            min-width: 30px;
            text-align: center;
            font-size: 1.1rem;
            color: var(--dark);
        }

        .remove-btn {
            background: var(--danger);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remove-btn:hover {
            background: var(--danger-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        .cart-summary {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .total {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }

        .total-amount {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
        }

        .checkout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray);
        }

        .empty-cart i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--gray);
            opacity: 0.7;
        }

        .empty-cart h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .back-shop {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin: 30px auto;
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: var(--light);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            width: fit-content;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-shop:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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
            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .cart-item img {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .cart-summary {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .logo {
                font-size: 1.5rem;
            }

            .cart-title {
                font-size: 2rem;
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
            <a class="back-shop" href="{{ url('/') }}">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Shop</span>
            </a>
        </header>

        <h1 class="cart-title">Your Shopping Cart</h1>

        <div class="cart-container">
            @if(session('cart') && count(session('cart')) > 0)
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $item)
            @php $total += $item['price'] * $item['quantity']; @endphp
            <div class="cart-item">
                <img src="{{ $item['image'] ?? 'https://via.placeholder.com/120x90/1e293b/64748b?text=Product' }}" alt="{{ $item['name'] }}">
                <div class="cart-item-details">
                    <h3>{{ $item['name'] }}</h3>
                    <p>₱{{ number_format($item['price'], 2) }}</p>
                    <div class="quantity-controls">
                        <a href="{{ route('cart.decrease', $id) }}">
                            <button class="quantity-btn" {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>
                                <i class="fas fa-minus"></i>
                            </button>
                        </a>
                        <span class="quantity">{{ $item['quantity'] }}</span>
                        <a href="{{ route('cart.increase', $id) }}">
                            <button class="quantity-btn">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="{{ route('cart.remove', $id) }}">
                    <button class="remove-btn">
                        <i class="fas fa-trash"></i>
                        Remove
                    </button>
                </a>
            </div>
            @endforeach

            <div class="cart-summary">
                <div class="total">Total: <span class="total-amount">₱{{ number_format($total, 2) }}</span></div>
                <a href="{{ route('checkout') }}">
                    <button class="checkout-btn">
                        <i class="fas fa-lock"></i>
                        Proceed to Checkout
                    </button>
                </a>
            </div>
            @else
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <h2>Your cart is empty</h2>
                <p>Explore our products and add items to your cart</p>
            </div>
            @endif
        </div>

        <footer>
            <p>© 2023 Nexus Shop. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Add animation to quantity changes
        document.addEventListener('DOMContentLoaded', function() {
            const quantityButtons = document.querySelectorAll('.quantity-btn');

            quantityButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.disabled) {
                        e.preventDefault();
                        return;
                    }

                    // Add pulse animation
                    this.style.animation = 'pulse 0.3s ease';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 300);
                });
            });
        });

        // Add pulse animation to CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>