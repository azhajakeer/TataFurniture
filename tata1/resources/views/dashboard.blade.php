<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('taATa') }}
            </h2>
            <!-- Shop Now Button -->
            <a href="/shop" class="px-6 py-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-semibold rounded-full shadow-lg hover:from-indigo-600 hover:to-pink-600 transform transition duration-300 hover:scale-105">
                Shop Now
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white p-6 rounded-lg shadow-lg mb-6">
                <h3 class="text-2xl font-bold">
                    Welcome, {{ Auth::user()->name }}!
                </h3>
                <p class="mt-2 text-sm">
                    Start exploring our amazing products or manage your profile with ease.
                </p>
            </div>

            <!-- Card Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Buy Card (Updated) -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Buy List</h4>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Note down the items you'd like to buy and keep track of your wishlist.
                    </p>

                    <!-- Item Input Section -->
                    <form action="/add-to-buy-list" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="item" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Item Name</label>
                            <input type="text" id="item" name="item" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Enter item name" required>
                        </div>
                        <div class="mb-4">
                            <label for="note" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Note</label>
                            <textarea id="note" name="note" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Add any additional notes" rows="3"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-teal-400 to-cyan-500 text-white py-2 rounded-lg hover:from-teal-500 hover:to-cyan-600 transition duration-300">
                            Add to Buy List
                        </button>
                    </form>
                </div>
                <!-- Card 2 -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">My Cart</h4>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        View items in your cart and proceed to checkout.
                    </p>
                    <a href="/cart" class="mt-4 inline-block text-blue-500 hover:underline text-sm">
                        Visit Cart
                    </a>
                </div>
                <!-- Card 3 -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Account Settings</h4>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Manage your account details and preferences.
                    </p>
                    <a href="/profile" class="mt-4 inline-block text-blue-500 hover:underline text-sm">
                        Manage Account
                    </a>
                </div>
            </div>

            <!-- Explore More Section with New Button Style -->
            <div class="flex justify-center mt-8">
                <a href="/shop" class="px-8 py-4 bg-gradient-to-r from-teal-400 to-cyan-500 text-white text-lg font-semibold rounded-full shadow-lg hover:from-teal-500 hover:to-cyan-600 transform transition duration-300 hover:scale-105">
                    Explore More
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
