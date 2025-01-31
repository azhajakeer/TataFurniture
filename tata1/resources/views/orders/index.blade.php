<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Listing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-green-600 mb-8">Order Listing</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Order Table -->
        <table class="table-auto w-full border-collapse bg-gray-50 rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Order ID</th>
                    <th class="px-6 py-3 text-left">Product Image</th>
                    <th class="px-6 py-3 text-left">Product Name</th>
                    <th class="px-6 py-3 text-left">Quantity</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left">Total Price</th>
                    <th class="px-6 py-3 text-left">Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-3 text-center">{{ $order->id }}</td>
                        <td class="px-6 py-3 text-center">
                            @if($order->product && $order->product->image_url)
                                <img src="{{ asset('storage/'.$order->product->image_url) }}" alt="Product Image" class="w-16 h-16 object-cover rounded">
                            @else
                                <span>No Image Available</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            @if($order->product)
                                {{ $order->product->name }}
                            @else
                                Product not available
                            @endif
                        </td>
                        <td class="px-6 py-3 text-center">{{ $order->quantity }}</td>
                        <td class="px-6 py-3 text-center">${{ number_format($order->price, 2) }}</td>
                        <td class="px-6 py-3 text-center">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-6 py-3 text-center">
                            {{ $order->created_at ? $order->created_at->format('d-m-Y H:i') : 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
