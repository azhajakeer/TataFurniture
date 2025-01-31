<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
            <!-- Product Name -->
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
            
            <!-- Product Description -->
            <p class="text-lg text-gray-700 mb-6">{{ $product->description }}</p>
            
            <!-- Product Price -->
            <p class="text-3xl font-semibold text-green-600 mb-6">${{ number_format($product->price, 2) }}</p>

            <!-- Product Image -->
            @if($product->images && count($product->images) > 0)
                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg shadow-md mb-6">
            @else
                <img src="https://via.placeholder.com/600x400" alt="No Image" class="w-full h-96 object-cover rounded-lg shadow-md mb-6">
            @endif

            <!-- Back to Products Button -->
            <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                <span class="font-semibold">Back to Products</span>
            </a>
        </div>
    </div>
</body>

</html>
