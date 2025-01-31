<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'images',
        'total_price',
    ];

    protected $connection = 'mongodb';

    // Ensure the created_at and updated_at are treated as dates
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Define a relationship to the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', '_id');
    }
}