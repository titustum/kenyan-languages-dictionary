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
            $table->id(); // This is the ID for the conceptual entry (e.g., 'CAT' concept)

            // Foreign key to a user who might have created this *concept* or managed it
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->default(1)
                  ->comment('The user who created or last updated this main entry concept.');

            // Core English representation (for reference)
            $table->string('word_en')->unique()->comment('The primary English word for this concept (e.g., "Cat").');
            $table->string('slug_en')->unique()->comment('Unique URL-friendly slug for the English word.');
            $table->text('description_en')->nullable()->comment('General English description for the concept.');
            $table->text('example_sentence_en')->nullable()->comment('An example sentence in English for the concept.');

            // Link to category (language-agnostic categories)
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete()
                  ->comment('The category this dictionary concept belongs to (e.g., animal, food).');

            // --- RE-ADDED: Image path directly on main entry ---
            $table->string('image_path')->nullable()->comment('Path to the main image file for this concept.');

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