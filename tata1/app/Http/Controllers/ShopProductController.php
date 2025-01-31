<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopProductController extends Controller
{
    /**
     * Display the list of shop products.
     */
    public function index(Request $request)
    {
        $query = Product::query();
    
        // Filter by category
        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }
    
        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
    
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
    
        // Filter by search keyword
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
    
        $products = $query->get();
    
        return view('shop.products', compact('products'));
    }
    public function show($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Pass product to the view
        return view('products.show', compact('product'));
    }

}

