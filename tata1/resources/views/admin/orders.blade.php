<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

   <!-- Navigation Bar -->
  <nav class="bg-green-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-extrabold tracking-wide hover:text-gray-300 transition duration-300">
                tATa
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-6">
                <a href="/" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    Home
                </a>
                <a href="/shop" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    Shop
                </a>
            </div>

            <!-- Right Section (Login, Register & Cart) -->
            <div class="flex items-center space-x-4">
                <a href="/login" class="bg-white text-lime-800 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">
                    Login
                </a>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <main class="flex-grow container mx-auto py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Orders List</h1>
        
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-3 px-6">Order ID</th>
                    <th class="py-3 px-6">Customer ID</th>
                    <th class="py-3 px-6">Total Price</th>
                    <th class="py-3 px-6">Status</th>
                    <th class="py-3 px-6">Mark as Completed</th> <!-- Column for checkbox -->
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $order->id }}</td>
                        <td class="py-3 px-6">{{ $order->user_id }}</td>
                        <td class="py-3 px-6">${{ $order->total_price }}</td>
                        <td class="py-3 px-6">
                            <span class="px-3 py-1 rounded-lg text-white 
                                {{ $order->status == 'Completed' ? 'bg-green-500' : 'bg-yellow-500' }}" id="status-{{ $order->id }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="py-3 px-6">
                            <input type="checkbox" class="checkbox-status" data-order-id="{{ $order->id }}" 
                                {{ $order->status == 'Completed' ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <script>
        // JavaScript to handle checkbox changes and toggle status between 'Pending' and 'Completed'
        document.querySelectorAll('.checkbox-status').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                const orderId = this.getAttribute('data-order-id');
                const statusSpan = document.getElementById('status-' + orderId);

                if (this.checked) {
                    statusSpan.textContent = 'Completed';
                    statusSpan.classList.remove('bg-yellow-500');
                    statusSpan.classList.add('bg-green-500');
                } else {
                    statusSpan.textContent = 'Pending';
                    statusSpan.classList.remove('bg-green-500');
                    statusSpan.classList.add('bg-yellow-500');
                }
            });
        });
    </script>

</body>
</html>
