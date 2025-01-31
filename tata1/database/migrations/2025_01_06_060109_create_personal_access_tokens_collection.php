<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint; // Ensure the correct import for MongoDB migration
use Illuminate\Support\Facades\DB;

class CreatePersonalAccessTokensCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('personal_access_tokens', function ($collection) {
            // Check if the 'token' index exists, and if not, create it
            if (!$collection->getIndexInfo('token_1')) {
                $collection->index('token'); // Add an index to the token field for faster searches
            }

            $collection->string('name');
            $collection->string('token');
            $collection->json('abilities')->nullable();
            $collection->dateTime('last_used_at')->nullable();
            $collection->dateTime('expires_at')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('personal_access_tokens');
    }
}
