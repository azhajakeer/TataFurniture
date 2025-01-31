<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order; // Define an Order model for storing purchase data
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Show the checkout page
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to proceed with checkout.');
        }

        $cartItems = Cart::where('user_id', Auth::id())
                        ->with('product') // Assuming Cart has a relationship with Product
                        ->get();

        return view('checkout.index', compact('cartItems'));
    }

    // Process the checkout
    public function process()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to proceed with checkout.');
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $orderData = [];
        $total = 0;

        foreach ($cartItems as $item) {
            $orderData[] = [
                'user_id' => Auth::id(),
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'total_price' => $item->product->price * $item->quantity,
            ];
            $total += $item->product->price * $item->quantity;
        }

        // Store the order in the database
        Order::insert($orderData);

        // Clear the cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Purchase successful! Total: $' . $total);
    }
    public function showCheckout()
{
    // Example: set the progress and orderPlaced dynamically
    $progress = 50; // Dynamic progress value (e.g., from order processing)
    $orderPlaced = false; // Set this based on the actual order status

    // You can set $orderPlaced to true if the order has been placed successfully
    // For example, after the user clicks the "Place Order" button, set it to true

    return view('checkout', compact('progress', 'orderPlaced'));
    
}


public function showOrders()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to view your orders.');
    }

    // Fetch orders for the logged-in user, with the product relationship
    $orders = Order::with('product')->where('user_id', Auth::id())->get();

    return view('orders.index', compact('orders'));
}

}


