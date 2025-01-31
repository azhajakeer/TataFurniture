<div>
    <!-- Search Input -->
    <input 
        type="text" 
        wire:model="searchTerm" 
        class="w-full p-2 border rounded-lg mb-4" 
        placeholder="Search products..."
    />

    <!-- Display Products -->
    <div class="space-y-4">
        @forelse($products as $product)
            <div class="bg-white p-4 rounded shadow-lg">
                <h5 class="text-lg font-semibold">{{ $product->name }}</h5>
                <p>${{ $product->price }}</p>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
</div>
