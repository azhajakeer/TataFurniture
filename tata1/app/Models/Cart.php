<?php
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Use the correct MongoDB base model

class Cart extends Model
{
    // Specify the MongoDB connection
    protected $connection = 'mongodb';

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Define any relationships (if necessary)
    public function product()
    {
        return $this->belongsTo(Product::class); // Assuming 'Product' exists
    }

    // Optionally, you can define other model properties and methods here as needed
}
