<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TATA FURNITURES</title>
    <link rel="stylesheet" href="/ECOMMERCE/public/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-lime-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-extrabold tracking-wide hover:text-gray-300 transition duration-300">
                TATA FURNITURES
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
                <a href="/register" class="bg-yellow-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300">
                    Register
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

    <!-- Static Images -->
    <img src="/storage/images/12345.png" alt="Static Image 1" class="w-full max-w-full h-auto object-contain">
    
    <section class="my-12">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-extrabold text-lime-800 mb-8">Featured Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <img src="/storage/images/18.jpeg" alt="Featured Item 1" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-lime-800 mb-2">Dinning Table</h3>
                <p class="text-gray-600 mb-4">Full Teak Stone worked set</p>
                <a href="/product/1" class="inline-block bg-lime-800 text-white px-6 py-2 rounded-full font-semibold text-lg hover:bg-lime-700 transition duration-300">
                    View Details
                </a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <img src="/storage/images/19.jpeg" alt="Featured Item 2" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-lime-800 mb-2">Arm Chair</h3>
                <p class="text-gray-600 mb-4">Elegant design and premium materials. A must-have for modern homes.</p>
                <a href="/product/2" class="inline-block bg-lime-800 text-white px-6 py-2 rounded-full font-semibold text-lg hover:bg-lime-700 transition duration-300">
                    View Details
                </a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <img src="/storage/images/14.jpg" alt="Featured Item 3" class="w-full h-64 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-lime-800 mb-2">Jute Basket</h3>
                <p class="text-gray-600 mb-4">Elegant design and premium materials. Perfect for your home decor need.</p>
                <a href="/product/3" class="inline-block bg-lime-800 text-white px-6 py-2 rounded-full font-semibold text-lg hover:bg-lime-700 transition duration-300">
                    View Details
                </a>
            </div>
        </div>
    </div>
</section>


    <img src="/storage/images/Desktop - 4.png" alt="Static Image 1" class="w-full max-w-full h-auto object-contain">


            <!-- Image -->
           
        </div>
    </div>

    <!-- Static Images -->
    <img src="/storage/images/1234.png" alt="Static Image 3" class="w-full max-w-full h-auto object-contain">
    <img src="/storage/images/123.jpeg" alt="Static Image 4" class="w-full max-w-full h-auto object-contain">

    <!-- Footer -->
<footer class="bg-lime-800 text-white py-12 mt-20 relative">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Left Section: Brand Info -->
        <div class="flex flex-col md:flex-row items-start md:space-x-8 space-y-4 md:space-y-0">
            <div class="bg-opacity-30 bg-white px-6 py-4 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-white">100% Guaranteed Product</h3>
                <p class="mt-2 text-white">Loyal customers</p>
            </div>
            <div class="bg-opacity-30 bg-white px-6 py-4 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-white">TATA FURNITURES</h3>
                <p class="mt-2 text-white">Your one-stop shop for premium furniture</p>
            </div>
        </div>
        
        <!-- Right Section: Social Media & Icons -->
        <div class="flex flex-col items-center mt-8 md:mt-0">
            <div class="flex space-x-6">
                <a href="#" class="text-white hover:text-lime-400">
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                        <path d="M22.46 6c-.77.35-1.59.59-2.46.69a4.28 4.28 0 001.88-2.38c-.82.49-1.74.84-2.71 1.03a4.26 4.26 0 00-7.28 3.88 12.1 12.1 0 01-8.77-4.45 4.26 4.26 0 001.32 5.68 4.22 4.22 0 01-1.93-.53v.05a4.26 4.26 0 003.42 4.18c-.5.14-1.03.21-1.57.21-.39 0-.77-.04-1.14-.11a4.27 4.27 0 003.98 2.96 8.56 8.56 0 01-5.3 1.83c-.34 0-.67-.02-1-.06a12.07 12.07 0 006.52 1.91c7.82 0 12.1-6.48 12.1-12.1 0-.19-.01-.37-.02-.55a8.65 8.65 0 002.13-2.2z"></path>
                    </svg>
                </a>
                <!-- Add more social icons if needed -->
            </div>
            <p class="text-sm mt-4 text-white">© 2025 Tata Furnitures. All Rights Reserved.</p>
        </div>
    </div>
</footer>

    </body>
</html>

