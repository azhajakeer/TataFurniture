<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/products', function () {
    $products = Product::all();
    return response()->json(['products' => $products], 200);
})->name('products.list');


Route::post('/products', function (Request $request) {
    $product = Product::create($request->all());
    return response()->json(['product' => $product, 'message' => 'Product created successfully'], 201);
})->middleware('auth:sanctum')->name('products.create');

Route::get('/products', function () {
    $products = Product::all();
    return response()->json(['products' => $products], 200);
})->middleware('auth:sanctum')->name('products.index');


Route::get('/products/{id}', function ($id) {
    $product = Product::find($id);
    if ($product) {
        return response()->json(['product' => $product], 200);
    }
    return response()->json(['message' => 'Product not found'], 404);
})->middleware('auth:sanctum')->name('products.show');

Route::put('/products/{id}', function (Request $request, $id) {
    $product = Product::find($id);
    if ($product) {
        $product->update($request->all());
        return response()->json(['product' => $product, 'message' => 'Product updated successfully'], 200);
    }
    return response()->json(['message' => 'Product not found'], 404);
})->middleware('auth:sanctum')->name('products.update');


Route::post('/cart/{productId}/add', function (Request $request, $productId) {
    // Assuming Cart and Product Models exist and are related
    $product = Product::find($productId);
    if ($product) {
        $cartItem = Cart::create([
            'product_id' => $productId,
            'user_id' => $request->user()->id,
            'quantity' => $request->input('quantity', 1),
        ]);
        return response()->json(['cartItem' => $cartItem, 'message' => 'Product added to cart successfully'], 201);
    }
    return response()->json(['message' => 'Product not found'], 404);
})->middleware('auth:sanctum')->name('cart.add');

Route::get('/cart', function (Request $request) {
    $cartItems = Cart::where('user_id', $request->user()->id)->get();
    return response()->json(['cartItems' => $cartItems], 200);
})->middleware('auth:sanctum')->name('cart.index');


Route::post('/checkout', function (Request $request) {
    // Implement checkout logic here
    return response()->json(['message' => 'Checkout processed successfully'], 200);
})->middleware('auth:sanctum')->name('checkout.process');



Route::put('/products/{id}', function (Request $request, $id) {
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->update($request->all());
    return response()->json(['product' => $product, 'message' => 'Product updated successfully'], 200);
})->middleware('auth:sanctum')->name('products.update');

Route::delete('/products/{id}', function ($id) {
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->delete();
    return response()->json(['message' => 'Product deleted successfully'], 200);
})->middleware('auth:sanctum')->name('products.delete');

Route::get('/categories/{categoryId}/products', function ($categoryId) {
    $products = Product::where('category_id', $categoryId)->get();
    return response()->json(['products' => $products], 200);
})->name('categories.products');

use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * Register a new user.
 */
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json([
        'message' => 'Registration successful',
        'user' => $user,
        'token' => $token,
    ], 201);
})->name('auth.register');

Route::post('/login', function (Request $request) {
    // Validate the request
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Find the user by email
    $user = User::where('email', $validated['email'])->first();

    // Log user for debugging
    Log::info('User credentials:', ['email' => $validated['email']]);
    Log::info('User found:', ['user' => $user]);

    // Check if the user exists and the password is correct
    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Generate a token for the user
    $token = $user->createToken('authToken', ['*']); // '*' grants all abilities

    // Log the generated token for debugging
    Log::info('Generated Token:', ['token' => $token->plainTextToken]);

    return response()->json([
        'message' => 'Login successful',
        'user' => $user,
        'token' => $token->plainTextToken,
    ], 200);
});

/**
 * Log out the authenticated user.
 */
Route::post('/logout', function (Request $request) {
    if ($request->user()) {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }

    return response()->json(['error' => 'Not authenticated'], 401);
})->middleware('auth:sanctum')->name('auth.logout');

/**
 * Get details of the authenticated user.
 */
Route::get('/user', function (Request $request) {
    return response()->json([
        'user' => $request->user(),
    ], 200);
})->middleware('auth:sanctum')->name('auth.user');