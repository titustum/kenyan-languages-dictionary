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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('region')->nullable();
            $table->string('color')->nullable(); // e.g. 'yellow' for Kikuyu, 'green' for Luhya
            $table->string('image_path')->nullable(); //e.g. Kalenjin athlete or Maasai morans image
            $table->string('icon')->nullable(); // e.g. 🌄 for Kikuyu, 🌿 for Luhya
            $table->string('speakers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
