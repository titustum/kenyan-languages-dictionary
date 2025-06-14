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
        Schema::create('dictionary_entries', function (Blueprint $table) {
            $table->id();
            // Foreign keys
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            // Word details
            $table->string('word');
            $table->string('slug')->unique();
            $table->string('translation_en');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // e.g. animal, food
            $table->string('image_path')->nullable();
            $table->string('audio_path')->nullable();
            $table->text('example_sentence')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionary_entries');
    }
};
