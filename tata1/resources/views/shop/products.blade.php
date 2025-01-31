
<x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styling for hover effects and border filter */
        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #e0f7fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border-color: #26a69a;
        }

        /* Custom styling for the spinner */
        #loadingSpinner svg {
            animation: spin 3s linear infinite; /* Adjusted to 3s */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
  <!-- Navigation Bar -->
  <nav class="bg-green-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-xl font-extrabold tracking-wide hover:text-gray-300 transition duration-300">
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
               
                <!-- Cart Icon -->
                <div class="relative">
                    <a href="/cart" class="flex items-center bg-white px-3 py-2 rounded-lg hover:bg-gray-200 transition duration-300">
                        <span class="text-lime-800 text-lg">🛒</span>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">2</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

<body class="bg-gradient-to-r from-green-50 to-green-100">
    <div class="container mx-auto py-12 flex">
        <!-- Sidebar -->
        <div class="w-1/4 px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Filters</h2>

            <!-- Search Form -->
            <div class="mb-6">
                <form action="{{ route('products.index') }}" method="GET" id="searchForm">
                    <div class="relative">
                        <!-- Search Input -->
                        <input type="text" name="search" placeholder="Search Products"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">

                        <!-- Search Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-2 rounded-lg hover:bg-gradient-to-l hover:from-green-600 hover:to-teal-600 transition duration-200 relative">
                            Search

                            <!-- Spinner inside the button (hidden by default) -->
                            <div id="loadingSpinner"
                                class="absolute inset-0 flex items-center justify-center bg-indigo-600 rounded-lg hidden">
                                <svg class="h-6 w-6 text-white animate-spin-slow" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Category Filter -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Category</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('products.index') }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">All</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Table']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Tables</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Chair']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Chairs</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Bed']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Beds and Essentials</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Sets']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Full Sets</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Wardrobe']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Wardrobe</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'Dressing table']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Dressing Table</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'interior']) }}"
                            class="text-sm text-gray-600 hover:text-green-500 transition duration-300 ease-in-out transform hover:scale-105">Home Decors</a></li>
                </ul>
            </div>

            <!-- Price Filter -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Price</h3>
                <form action="{{ route('products.index') }}" method="GET">
                    <input type="range" name="price" min="0" max="100" value="50"
                        class="w-full appearance-none bg-green-200 rounded-lg overflow-hidden h-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <div class="flex justify-between text-sm text-gray-600 mt-2">
                        <span>$10</span>
                        <span>$5000</span>
                    </div>
                    <button type="submit"
                        class="mt-4 w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-2 rounded-lg hover:bg-gradient-to-l hover:from-green-600 hover:to-teal-600 transition duration-200">Apply Filters</button>
                </form>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="w-3/4">
            <h1 class="text-4xl font-extrabold text-center mb-12 text-gray-900">Shop Products</h1>

            <!-- Product Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl product-card">
                    <a href="{{ route('products.show', ['id' => $product->id]) }}" class="block">
                        <!-- Product Image -->
                        <div class="relative">
                            @if($product->images && count($product->images) > 0)
                            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                                class="w-full h-60 object-cover rounded-t-lg">
                            @else
                            <img src="https://via.placeholder.com/300x300" alt="No Image"
                                class="w-full h-60 object-cover rounded-t-lg">
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-6">
                            <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h5>
                            <p class="text-lg font-semibold text-green-500">${{ $product->price }}</p>
                        </div>
                    </a>

                    <!-- Add to Cart Form -->
                    <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST"
                        class="p-4 bg-gray-100 rounded-b-lg">
                        @csrf
                        <div class="flex items-center justify-between">
                            <input type="number" name="quantity" value="1" min="1" required
                                class="w-1/4 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <button type="submit"
                                class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-2 rounded-lg hover:bg-gradient-to-l hover:from-green-600 hover:to-teal-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 7M7 13l-4 8h16M9 21a2 2 0 100-4 2 2 0 000 4zm7 0a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const searchForm = document.getElementById('searchForm');
        const loadingSpinner = document.getElementById('loadingSpinner');

        searchForm.addEventListener('submit', function(event) {
            loadingSpinner.classList.remove('hidden'); // Show the spinner
        });
    </script>
</body>

</html>
    </x-app-layout>