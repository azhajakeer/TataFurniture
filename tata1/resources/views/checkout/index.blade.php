<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Checkout</title>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- FontAwesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        function updateProgressBar(progress) {
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            progressBar.style.width = progress + '%';
            progressText.innerText = progress + '%';
        }

        function handleConfirmPurchase(event) {
            event.preventDefault();
            let progress = 0;
            const interval = setInterval(() => {
                if (progress < 100) {
                    progress += 10;
                    updateProgressBar(progress);
                } else {
                    clearInterval(interval);
                    event.target.submit();
                }
            }, 500);
        }
    </script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-green-600">Checkout</h1>

        @if(!empty($cartItems) && count($cartItems) > 0)
            <div class="bg-white shadow-md rounded-lg p-6 border border-green-500">
                <ul class="space-y-4">
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        <li class="flex items-center space-x-6 border-b pb-4">
                            @if($item->product)
                                <div class="col-md-4">
                                    @if(!empty($item->product->images) && is_array($item->product->images))
                                        <img src="{{ asset('storage/' . $item->product->images[0]) }}" alt="Product Image" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                                    @else
                                        <span class="text-red-500">No image available</span>
                                    @endif
                                </div>
                                <div class="flex-grow">
                                    <p class="font-semibold text-lg text-gray-800">{{ $item->product->name }}</p>
                                    <p class="text-gray-600">${{ $item->product->price }} x {{ $item->quantity }}</p>
                                </div>
                            @else
                                <p class="text-red-500">Product not available</p>
                            @endif
                        </li>
                        @php $total += $item->product->price * $item->quantity; @endphp
                    @endforeach
                </ul>

                <div class="mt-6 flex justify-between items-center">
                    <p class="text-xl font-semibold text-green-600"><strong>Total: ${{ $total }}</strong></p>
                </div>
            </div>

            <div class="mt-6">
                <p class="text-gray-600 mb-2">Order Progress: <span id="progress-text">50</span>%</p>
                <div class="w-full bg-gray-200 rounded-full h-6">
                    <div id="progress-bar" class="bg-green-500 h-6 rounded-full transition-all duration-500" style="width: 50%;"></div>
                </div>
            </div>

            <div class="mt-6">
                <form action="{{ route('checkout.process') }}" method="POST" onsubmit="handleConfirmPurchase(event)">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300">Confirm Purchase</button>
                </form>
            </div>
        @else
            <div class="bg-white p-6 rounded-lg shadow-md text-center border border-green-500">
                <p class="text-lg font-semibold text-gray-600">Your cart is empty.</p>
            </div>
        @endif
    </div>

</body>
</html>
