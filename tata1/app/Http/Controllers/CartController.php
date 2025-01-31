<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display the user's cart
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }

        // Fetch the cart items for the logged-in user
        $cartItems = Cart::where('user_id', Auth::id())
                        ->with('product') // Include product details
                        ->get();

                        
        return view('cart.index', compact('cartItems'));
    }

    // Add product to the cart
    public function addToCart(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add products to your cart.');
        }
    
        $request->validate(['quantity' => 'required|integer|min:1']);
    
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $cartItem = Cart::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ],
            [
                'quantity' => $request->quantity,
            ]
        );
    
        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        }
    
        return back()->with('success', 'Product added to your cart!');
    }
    
    
    // Delete a cart item
    public function destroy($cartItemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to modify your cart.');
        }

        $cartItem = Cart::where('_id', $cartItemId)->where('user_id', Auth::id())->first();

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully.');
    }

    // Update cart item quantity
    public function update(Request $request, $cartItemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to modify your cart.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('_id', $cartItemId)->where('user_id', Auth::id())->first();

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart item updated successfully.');
    }
}
