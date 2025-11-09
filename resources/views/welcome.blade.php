<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Shop | Futuristic Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #0ea5e9;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
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
            max-width: 1200px;
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

        .cart-link {
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

        .cart-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .cart-link i {
            font-size: 1.2rem;
        }

        .shop-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .product-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 20px;
            color: var(--dark);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.2);
        }

        .product-card:hover::before {
            transform: scaleX(1);
        }

        .product-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .product-card:hover .product-image {
            transform: scale(1.03);
        }

        .product-card h3 {
            margin: 10px 0 5px;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            margin: 10px 0;
        }

        .product-description {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .add-to-cart {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: auto;
        }

        .add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }

        .add-to-cart:active {
            transform: translateY(0);
        }

        .badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
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
            .shop-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            header {
                flex-direction: column;
                gap: 15px;
            }

            .logo {
                font-size: 1.5rem;
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
            <a class="cart-link" href="{{ route('cart') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>View Cart</span>
            </a>
        </header>

        <div class="shop-container">
            @foreach($products as $product)
            <div class="product-card">
                @if($product->isNew)
                <div class="badge">NEW</div>
                @endif

                @if($product->image)
                <img class="product-image" src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                <img class="product-image" src="https://via.placeholder.com/300x180/1e293b/64748b?text=Product+Image" alt="No image">
                @endif

                <h3>{{ $product->name }}</h3>
                <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                <p class="product-description">{{ $product->description ?? 'Premium quality product with advanced features.' }}</p>

                <a href="{{ route('cart.add', $product->id) }}">
                    <button class="add-to-cart">
                        <i class="fas fa-cart-plus"></i>
                        Add to Cart
                    </button>
                </a>
            </div>
            @endforeach
        </div>

        <footer>
            <p>© 2025 Nexus Shop. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>