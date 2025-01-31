<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Display Add Product Form
    public function index()
    {
        return view('admin.add-product');
    }

    // Store New Product
    // Store New Product
    public function store(Request $request)
    {
        // Validate the product data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Create the product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'images' => [], // Placeholder for images
        ]);
    
        // Process and store the images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store the image in public/storage/products directory
                $path = $image->store('products', 'public');  // Store inside 'storage/app/public/products'
                $imagePaths[] = $path;
            }
        }
    
        // Save images to product
        $product->images = $imagePaths;
        $product->save();
    
        return redirect()->route('admin.add-product')->with('success', 'Product added successfully!');
    }
    


    // List All Products
    public function list()
    {
        $products = Product::all();
        return view('products.listing', ['products' => $products]);
    }

    // Update Product
    public function update(Request $request, $id)
{
    // Validate the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category' => 'required|string',
        'images' => 'nullable|array', // Images are optional
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update basic product information
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'category' => $request->category,
    ]);

    // Handle image upload if new images are provided
    if ($request->hasFile('images')) {
        $imagePaths = [];

        foreach ($request->file('images') as $image) {
            // Store the image in the public storage directory
            $path = $image->store('products', 'public');  // Store inside 'storage/app/public/products'
            $imagePaths[] = $path;
        }

        // Update the product's images
        $product->images = $imagePaths;
        $product->save();
    }

    // Redirect back with a success message
    return redirect()->route('admin.list-products')->with('success', 'Product updated successfully!');
}



    // Delete Product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.list-products')->with('success', 'Product deleted successfully!');
    }
}
