<?php

// namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Auth\Authenticatable;
// use MongoDB\Laravel\Eloquent\Model; // Use the correct MongoDB base model

// class User extends Model implements AuthenticatableContract
// {
//     use Authenticatable; // This trait implements all methods of the Authenticatable contract

//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//     ];

//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     // Optional: Specify the MongoDB connection if you use multiple connections
//     protected $connection = 'mongodb';
// }


namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens; // Import the HasApiTokens trait
use MongoDB\Laravel\Eloquent\Model; // Use the correct MongoDB base model

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, HasApiTokens; // Use both Authenticatable and HasApiTokens

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Optional: Specify the MongoDB connection if you use multiple connections
    protected $connection = 'mongodb';
}


