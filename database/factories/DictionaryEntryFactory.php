<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\DictionaryEntry;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DictionaryEntry>
 */
class DictionaryEntryFactory extends Factory
{

    protected $model = DictionaryEntry::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $word = $this->faker->unique()->word();

        return [
            'language_id' => Language::inRandomOrder()->first()->id ?? Language::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'word' => $word,
            'slug' => Str::slug($word) . '-' . Str::random(4),
            'translation_en' => $this->faker->word(),
            'image_path' => 'images/sample-' . rand(1, 5) . '.jpg', // replace with actual sample images later
            'audio_path' => 'audio/sample-' . rand(1, 5) . '.mp3',   // replace with actual sample audio later
            'example_sentence' => $this->faker->sentence(),
        ];
    }
}
