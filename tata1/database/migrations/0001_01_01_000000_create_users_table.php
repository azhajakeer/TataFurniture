<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // You can initialize the 'users' collection by inserting a sample document
        DB::connection('mongodb')->collection('users')->insert([
            'name' => 'Sample User',
            'email' => 'sample@example.com',
            'password' => bcrypt('password123'),  // Just an example password
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        // Drop the 'users' collection (if you want to remove it completely)
        DB::connection('mongodb')->collection('users')->delete();
    }
};
