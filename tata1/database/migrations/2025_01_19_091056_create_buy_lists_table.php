<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    
{
    Schema::create('buy_lists', function (Blueprint $table) {
        $table->id();
        $table->string('item');
        $table->text('note')->nullable();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming you're associating the item with a user
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_lists');
    }
};
