<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .logo {
            order: 1;
            /* Menempatkan logo di kiri */
        }

        nav {
            order: 3;
            /* Menempatkan navigasi di kanan */
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 10px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            /* Mengatur grid agar responsif */
            gap: 20px;
            padding: 20px;
        }

        .product {
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <a href="{{ url('/') }}"><img src="logo.png" alt="Logo" width="100"></a>
        </div>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('carts') }}">
                        Cart
                        @php
                            $cartItemCount = \App\Models\Cart::where('deleted', 'false')->count();
                        @endphp
                        @if ($cartItemCount > 0)
                            <span class="badge badge-pill badge-primary">{{ $cartItemCount }}</span>
                        @endif
                    </a>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{ url('deliveryorders') }}">Delivery Order</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('deliveryorders') }}">
                        Delivery Order
                        @php
                            $ordersItemCount = \App\Models\Order::where('status', 'draft')->count();
                        @endphp
                        @if ($ordersItemCount > 0)
                            <span class="badge badge-pill badge-info">{{ $ordersItemCount }}</span>
                        @endif

                        @php
                            $ordersItemCount = \App\Models\Order::where('status', 'needapproval')->count();
                        @endphp
                        @if ($ordersItemCount > 0)
                            <span class="badge badge-pill badge-warning">{{ $ordersItemCount }}</span>
                        @endif


                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>Created by: Suryo</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
