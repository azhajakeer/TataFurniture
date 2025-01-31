
<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="/products/add" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    +New
                </a>
            </div>

            <a href="/products" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    products


                </a>
            </div>

            <!-- Right Section (Login, Register & Cart) -->
            
            
            </
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center bg-gradient-to-t from-blue-50 to-white py-10">

        <div class="text-center px-6 mb-12">
            <!-- Dynamic Greeting -->
            <h1 class="text-4xl font-bold text-gray-800 mb-6">
                Hello Admin, 
                <span id="greeting" class="text-blue-600"></span>!
            </h1>
            <p class="text-xl text-gray-600 mb-10">Welcome to your personalized dashboard.</p>

            <!-- Quick Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 w-full max-w-screen-xl mx-auto">
                <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-transform transform hover:scale-105">
                    <h2 class="text-3xl font-bold text-blue-600">150</h2>
                    <p class="text-gray-600 text-lg">Users</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-transform transform hover:scale-105">
                    <h2 class="text-3xl font-bold text-green-600">45</h2>
                    <p class="text-gray-600 text-lg">Orders</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-transform transform hover:scale-105">
                    <h2 class="text-3xl font-bold text-yellow-600">12</h2>
                    <p class="text-gray-600 text-lg">Pending Tasks</p>
                </div>
            </div>
        </div>

        <!-- Analytics Section (Main) -->
        <section class="w-full max-w-screen-xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Analytics Overview</h2>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">
                <!-- Bar Chart -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Monthly Sales</h3>
                    <canvas id="barChart" class="w-full h-[400px]"></canvas>
                </div>
                <!-- Pie Chart -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Sales by Category</h3>
                    <canvas id="pieChart" class="w-full h-[400px]"></canvas>
                </div>
            </div>
        </section>

        <!-- Buttons Section -->
<section class="w-full max-w-screen-xl mx-auto mb-12">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Quick Actions</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 w-full">
        <!-- Add Product Button -->
        <a href="{{ route('admin.add-product') }}" class="bg-blue-500 text-white py-4 px-6 rounded-lg hover:bg-blue-600 shadow-lg transition transform hover:scale-105 flex items-center justify-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14" />
            </svg>
            <span>Add Product</span>
        </a>
        
        <!-- View Products Button -->
        <a href="{{ route('products.list') }}" class="bg-green-500 text-white py-4 px-6 rounded-lg hover:bg-green-600 shadow-lg transition transform hover:scale-105 flex items-center justify-center space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M6 19L14 7l4 4L6 19z" />
    </svg>
    <span>View Products</span>
</a>

        <!-- View Orders Button (Placeholder for now) -->
        <a href="{{ route('admin.orders') }}" class="bg-yellow-500 text-white py-4 px-6 rounded-lg hover:bg-yellow-600 shadow-lg transition transform hover:scale-105 flex items-center justify-center space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 5h16M4 19h16M4 12h16" />
    </svg>
    <span>View Orders</span>
</a>


        
        <!-- Manage Users Button (Placeholder for now) -->
        <button class="bg-red-500 text-white py-4 px-6 rounded-lg hover:bg-red-600 shadow-lg transition transform hover:scale-105 flex items-center justify-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 4l4 4-4 4M21 4l-4 4 4 4" />
            </svg>
            <span>Manage Users</span>
        </button>
    </div>
</section>


    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>© 2025 Tata Furniture. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Greeting -->
    <script>
        const greetingElement = document.getElementById('greeting');
        const currentHour = new Date().getHours();

        if (currentHour < 12) {
            greetingElement.innerText = 'Good Morning';
        } else if (currentHour < 18) {
            greetingElement.innerText = 'Good Afternoon';
        } else {
            greetingElement.innerText = 'Good Evening';
        }
    </script>

    <!-- JavaScript for Charts -->
    <script>
        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Monthly Sales',
                    data: [150, 200, 300, 250, 400],
                    backgroundColor: ['#3b82f6', '#34d399', '#f59e0b', '#ef4444', '#6366f1'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Electronics', 'Furniture', 'Clothing', 'Books'],
                datasets: [{
                    data: [25, 30, 20, 25],
                    backgroundColor: ['#3b82f6', '#34d399', '#f59e0b', '#ef4444'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    </script>

</body>

</html>
    </x-app-layout>