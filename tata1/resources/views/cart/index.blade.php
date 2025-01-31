<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0ffe0, #ffffff);
            color: #333;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-horizontal {
            display: flex;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-header {
            background: #82c91e;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            flex-shrink: 0;
        }
        .card img {
            max-width: 180px;
            max-height: 180px;
            border-radius: 8px;
            border: 2px solid #ddd;
            object-fit: cover;
        }
        .card-price, .card-total {
            font-size: 1.2rem;
            color: #28a745;
        }
        .btn {
            border-radius: 50px;
            transition: 0.3s ease-in-out;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        .btn-danger {
            background: #ff3b30;
            color: white;
            border: none;
        }
        .btn-success {
            background: #28a745;
            border: none;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .quantity-controls button {
            width: 40px;
            height: 40px;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background-color: #f0f0f0;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .quantity-controls button:hover {
            background-color: #82c91e;
            color: white;
        }
        .quantity-controls p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .remove-btn {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">🛒 Your Cart</h1>

        @if(session('success'))
            <div class="alert alert-success text-center fw-bold">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p class="text-center">Your cart is empty. Start shopping now!</p>
        @else
            @php 
                $total = 0;  // Initialize total variable to 0
            @endphp

            <div class="row">
                @foreach($cartItems as $item)
                    <div class="col-md-12">
                        <div class="card card-horizontal">
                            <div class="card-header">
                                {{ $item->product->name }}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if(!empty($item->product->images) && is_array($item->product->images))
                                            <img src="{{ asset('storage/' . $item->product->images[0]) }}" alt="Product Image" class="img-fluid">
                                        @else
                                            <span>No image available</span>
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card-price">Price: ${{ $item->product->price }}</p>

                                        <!-- Quantity Controls -->
                                        <div class="quantity-controls">
                                            <!-- Decrease Button -->
                                            <form action="{{ route('cart.update', $item->_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="quantity" value="{{ max($item->quantity - 1, 1) }}"> <!-- Prevent negative or zero quantity -->
                                                <button type="submit" class="btn btn-sm">-</button>
                                            </form>

                                            <!-- Display Quantity -->
                                            <p>{{ $item->quantity }}</p>

                                            <!-- Increase Button -->
                                            <form action="{{ route('cart.update', $item->_id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}"> <!-- Increase quantity -->
                                                <button type="submit" class="btn btn-sm">+</button>
                                            </form>
                                        </div>

                                        <p class="card-total">Total: ${{ $item->product->price * $item->quantity }}</p>
                                        
                                        @php
                                            $total += $item->product->price * $item->quantity;  // Calculate total price
                                        @endphp

                                        <form action="{{ route('cart.delete', $item->_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this item from your cart?')">🗑 Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-end mt-4">
                <h3>Total: ${{ $total }}</h3> <!-- Display total amount -->
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
