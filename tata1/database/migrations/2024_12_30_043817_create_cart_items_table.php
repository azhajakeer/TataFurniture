<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('cart_items', function (Blueprint $table) {
        $table->id();  // auto-incrementing ID
        $table->foreignId('user_id')->constrained('users'); // link to users table
        $table->foreignId('product_id')->constrained('products'); // link to products table
        $table->integer('quantity');
        $table->decimal('price', 8, 2); // Store the price of the product
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('cart_items');
}

};
