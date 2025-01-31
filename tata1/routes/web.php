<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Models\Order;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\MongoController;

// Example Route:
Route::get('/mongo', [MongoController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard'); // Ensure you have a corresponding view
// })->name('admin/dashboard');




use App\Http\Controllers\Auth\CustomAuthController;

Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login']);
Route::get('/register', [CustomAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CustomAuthController::class, 'register']);
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');


use App\Http\Controllers\AdminProductController;
// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         Gate::authorize('isAdmin'); // Ensure only admins access this
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    Route::get('/products/add', function () {
      
        return app(AdminProductController::class)->index();
    })->name('admin.add-product');

    Route::post('/products/add', function () {
        
        return app(AdminProductController::class)->store(request());
    })->name('admin.store-product');

  


});
Route::get('/admin/orders', function () {
    $orders = Order::all(); // Fetch all orders from the database
    return view('admin.orders', compact('orders'));
})->name('admin.orders');




Route::get('/products', [AdminProductController::class, 'list'])->name('products.list');



use App\Http\Controllers\ShopProductController;
Route::get('/shop', [ShopProductController::class, 'index'])->name('shop.products');
Route::get('/shop', [ShopProductController::class, 'index'])->name('shop.products');
Route::get('/products/{id}', [ShopProductController::class, 'show'])->name('products.show');


Route::get('/shop', [ShopProductController::class, 'index'])->name('products.index');

Route::prefix('admin')->group(function () {
    // // Display Add Product Form
    // Route::get('/add-product', [AdminProductController::class, 'index'])->name('admin.add-product');
    
    // // Store Product
    // Route::post('/store-product', [AdminProductController::class, 'store'])->name('admin.store-product');
    
    // List Products
        Route::get('/products', [AdminProductController::class, 'list'])->name('admin.list-products');
        
    // Update Product
    Route::put('/update-product/{id}', [AdminProductController::class, 'update'])->name('admin.update-product');
    
    // Delete Product
    Route::delete('/delete-product/{id}', [AdminProductController::class, 'destroy'])->name('admin.delete-product');

   
});



use App\Http\Controllers\CartController;
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{cartItemId}', [CartController::class, 'destroy'])->name('cart.delete');

    Route::put('/cart/{cartItemId}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/{productId}/add', [CartController::class, 'addToCart'])->name('cart.add');
});

// routes/web.php
//Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/{productId}/add', [CartController::class, 'addToCart'])->name('cart.add');


use App\Http\Controllers\CheckoutController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
});


Route::get('/products/{id}', [ShopProductController::class, 'show'])->name('products.show');



Route::get('/orders', [CheckoutController::class, 'showOrders'])->name('orders.index');

use App\Http\Controllers\BuyListController;

Route::post('/add-to-buy-list', [BuyListController::class, 'store']);



require __DIR__.'/auth.php';
