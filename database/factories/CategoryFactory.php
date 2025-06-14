<?php
 
namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word(); // e.g., "Animals"
        return [
            'user_id' => User::factory(), // Assumes user factory exists
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'icon' => $this->faker->optional()->emoji(), // Optional emoji
        ];
    }
}
