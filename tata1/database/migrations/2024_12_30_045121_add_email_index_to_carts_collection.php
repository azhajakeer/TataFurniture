<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint; // Make sure this is included
use MongoDB\BSON\ObjectId;

class AddEmailIndexToCartsCollection extends Migration
{
    public function up()
    {
        // Use the correct MongoDB Schema Builder to add the index for 'email' field
        Schema::connection('mongodb')->table('carts', function ($collection) {
            $collection->createIndex(['email' => 1]);  // Create an index on the 'email' field
        });
    }

    public function down()
    {
        // Remove the index in case the migration is rolled back
        Schema::connection('mongodb')->table('carts', function ($collection) {
            $collection->dropIndex(['email' => 1]);  // Drop the index on 'email'
        });
    }
}

