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
        Schema::create('dictionary_main_entries', function (Blueprint $table) {
            $table->id(); // Concept ID (e.g., 'CAT')

            $table->foreignId('user_id')
                ->constrained('users')
                ->default(1)
                ->comment('User who created or last updated this main entry concept.');

            $table->string('word_en')->comment('Primary English word for the concept (e.g., "Cat").');
            $table->string('slug_en')->unique()->comment('Unique URL-friendly slug for the English word.');
            $table->text('description_en')->nullable()->comment('General English description for the concept.');
            $table->text('example_sentence_en')->nullable()->comment('Example sentence in English for the concept.');

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete()
                ->comment('Category this concept belongs to (e.g., animal, number, color).');

            $table->string('image_path')->nullable()->comment('Path to the image file representing the concept.');
            
            $table->string('icon')->nullable()->comment('Optional icon or emoji representation (e.g., 😊 or FontAwesome name).');

            // NEW: Store a HEX color code, e.g., #FF0000 for red
            $table->string('color_code', 7)->nullable()->comment('Optional color code (e.g., #FF0000) for color concepts.');

            // NEW: Store numeric value for concepts like "one", "two", etc.
            $table->integer('numeric_value')->nullable()->comment('Numeric value for number-related concepts (e.g., 1 for "One").');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionary_main_entries');
    }
};