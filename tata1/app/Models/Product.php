<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Updated namespace

class Product extends Model
{
    protected $connection = 'mongodb'; // MongoDB connection
    protected $collection = 'products'; // MongoDB collection

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category',
        'created_at',
        'images', // Added to handle images
    ];

    // Optionally, you can define the images relationship if using a separate collection for images
    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }
}
