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
        Schema::create('dictionary_translations', function (Blueprint $table) {
            $table->id();

            // Link to the main concept entry
            $table->foreignId('main_entry_id')
                  ->constrained('dictionary_main_entries')
                  ->cascadeOnDelete()
                  ->comment('Foreign key to the main dictionary concept entry.');

            // Link to the specific language for this translation
            $table->foreignId('language_id')
                  ->constrained('languages')
                  ->cascadeOnDelete()
                  ->comment('Foreign key to the language this translation is for.');

            // The translated word
            $table->string('word')->comment('The word in the specified language (e.g., "Pusit" for Nandi, "Paka" for Swahili).');
            $table->string('slug')->comment('Unique URL-friendly slug for the translated word within its language.');
            $table->text('description')->nullable()->comment('Description of the word in this specific language.');
            $table->text('example_sentence')->nullable()->comment('An example sentence using the word in this specific language.');

            // --- RE-ADDED: Audio path directly on translation ---
            $table->string('audio_path')->nullable()->comment('Path to the audio pronunciation for this specific language translation.');

            // Ensure unique combination: one translation per main entry per language
            $table->unique(['main_entry_id', 'language_id'], 'unique_translation_for_entry_lang');
            $table->unique(['language_id', 'slug'], 'unique_slug_per_language'); // Slug must be unique per language

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionary_translations');
    }
};