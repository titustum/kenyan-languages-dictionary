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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->default(1); // Default to user ID 1 (admin)
            $table->string('name')->unique();   // e.g. "Animals", "Food", "Greetings"
            $table->string('slug')->unique();   // e.g. "animals"
            $table->string('icon')->nullable(); // Optional emoji/icon (e.g. 🐄, 🍲)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
