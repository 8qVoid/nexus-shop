<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Nexus Shop</title>
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
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            grid-column: 1 / -1;
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

        .back-link {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 12px 20px;
            border-radius: 50px;
            color: var(--light);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .checkout-title {
            grid-column: 1 / -1;
            text-align: center;
            margin: 10px 0 30px;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .checkout-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            color: var(--dark);
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .checkout-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .checkout-card h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkout-card h2 i {
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        input,
        select {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            transition: var(--transition);
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            background: white;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 10px;
        }

        .payment-method {
            position: relative;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .payment-method:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .payment-method.selected {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.1);
        }

        .payment-icon {
            font-size: 2rem;
            margin-bottom: 8px;
            color: var(--primary);
        }

        .payment-method input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .order-summary {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            color: var(--dark);
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.2);
            height: fit-content;
        }

        .order-summary h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .order-summary h2 i {
            color: var(--primary);
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            margin-top: 15px;
            border-top: 2px solid rgba(0, 0, 0, 0.1);
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
        }

        .place-order-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 16px;
            margin-top: 20px;
            font-size: 1.1rem;
            font-weight: 600;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
        }

        .place-order-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        .security-notice {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            padding: 15px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 10px;
            color: var(--success);
            font-size: 0.9rem;
        }

        .security-notice i {
            font-size: 1.2rem;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            color: var(--gray);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            grid-column: 1 / -1;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .payment-methods {
                grid-template-columns: 1fr;
            }

            .logo {
                font-size: 1.5rem;
            }

            .checkout-title {
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
            <a class="back-link" href="{{ route('cart') }}">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Cart</span>
            </a>
        </header>

        <h1 class="checkout-title">Complete Your Purchase</h1>

        <form action="{{ route('checkout.process') }}" method="POST" class="checkout-card">
            @csrf
            <h2><i class="fas fa-user-circle"></i> Personal Information</h2>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>

            <h2><i class="fas fa-credit-card"></i> Payment Method</h2>

            <div class="payment-methods">
                <label class="payment-method">
                    <input type="radio" name="payment_method" value="gcash" required>
                    <div class="payment-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div>GCash</div>
                </label>

                <label class="payment-method">
                    <input type="radio" name="payment_method" value="cod">
                    <div class="payment-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div>Cash on Delivery</div>
                </label>
            </div>

            <div class="security-notice">
                <i class="fas fa-shield-alt"></i>
                <span>Your payment information is secure and encrypted</span>
            </div>

            <button type="submit" class="place-order-btn">
                <i class="fas fa-lock"></i>
                Place Order
            </button>
        </form>

        <div class="order-summary">
            <h2><i class="fas fa-receipt"></i> Order Summary</h2>

            <div class="order-item">
                <span>Subtotal</span>
                <span>₱{{ number_format($total, 2) }}</span>
            </div>

            <div class="order-item">
                <span>Shipping</span>
                <span>₱0.00</span>
            </div>

            <div class="order-item">
                <span>Tax</span>
                <span>₱{{ number_format($total * 0.12, 2) }}</span>
            </div>

            <div class="order-total">
                <span>Total</span>
                <span>₱{{ number_format($total * 1.12, 2) }}</span>
            </div>

            <div class="security-notice">
                <i class="fas fa-shipping-fast"></i>
                <span>Free shipping on all orders</span>
            </div>
        </div>

        <footer>
            <p>© 2023 Nexus Shop. All rights reserved.</p>
        </footer>
    </div>

    <script>
        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('selected');
                });
                this.classList.add('selected');
                this.querySelector('input').checked = true;
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

            if (!name || !email || !phone || !paymentMethod) {
                e.preventDefault();
                alert('Please fill in all required fields and select a payment method.');
            }
        });
    </script>
</body>

</html>