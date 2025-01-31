<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Olive Green Color */
        .bg-olive-green {
            background-color: #556B2F;
        }
        .text-olive-green {
            color: #556B2F;
        }
        .border-olive-green {
            border-color: #556B2F;
        }
        .hover-bg-olive-green:hover {
            background-color: #6b7c42;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">

<!-- Navigation Bar -->
<nav class="bg-green-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-extrabold tracking-wide hover:text-gray-300 transition duration-300">
                tATa
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-6">
                <a href="/admin/dashboard" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    <-Dashboard
                </a>
                <a href="/products" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    Products
                </a>
            </div>

          
        </div>
    </nav>

    <!-- Main container -->
    <div class="max-w-3xl mx-auto p-8 bg-white rounded-xl shadow-2xl mt-10">

        <!-- Heading -->
        <h1 class="text-4xl font-bold text-center text-olive-green mb-8">Add Product</h1>

        <!-- Success message -->
        @if(session('success'))
            <div class="mb-4 text-white p-4 bg-olive-green border border-olive-green rounded-xl shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form start -->
        <form action="{{ route('admin.store-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Product Name -->
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" class="mt-2 p-4 w-full border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300" required>
            </div>

            <!-- Product Description -->
            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Product Description</label>
                <textarea name="description" id="description" class="mt-2 p-4 w-full border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300" rows="4" required></textarea>
            </div>

            <!-- Price -->
            <div class="mb-6">
                <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="mt-2 p-4 w-full border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300" required>
            </div>

            <!-- Quantity -->
            <div class="mb-6">
                <label for="quantity" class="block text-lg font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="mt-2 p-4 w-full border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300" required>
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category" class="block text-lg font-medium text-gray-700">Category</label>
                <select name="category" id="category" class="mt-2 p-4 w-full border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300" required>
                    <option value="All">All</option>
                    <option value="Table">Tables</option>
                    <option value="Chair">Chairs</option>
                    <option value="Bed">Beds and Essentials</option>
                    <option value="Sets">Full Sets</option>
                    <option value="Wardrobe">Wardrobe</option>
                    <option value="Dressing table">Dressing Table</option>
                    <option value="Interior">Home Decors</option>
                </select>
            </div>

            <!-- Product Images -->
            <div class="mb-6">
                <label for="images" class="block text-lg font-medium text-gray-700">Product Images</label>
                <input type="file" name="images[]" id="images" class="mt-2 p-4 w-full border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300" accept="image/*" multiple required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-3 bg-olive-green text-white font-semibold rounded-xl hover:bg-olive-green focus:outline-none focus:ring-2 focus:ring-olive-green transition duration-300">
                Add Product
            </button>
        </form>
        <!-- Form end -->

    </div>

</body>
</html>
