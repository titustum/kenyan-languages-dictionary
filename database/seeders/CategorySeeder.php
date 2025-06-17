<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Animals',    'icon' => '🐄'],
            ['name' => 'Food',       'icon' => '🍲'],
            ['name' => 'Greetings',  'icon' => '👋'],
            ['name' => 'Numbers',    'icon' => '🔢'],
            ['name' => 'People',     'icon' => '🧍'],
            ['name' => 'Nature',     'icon' => '🌿'],
            ['name' => 'Clothing',   'icon' => '👕'],
            ['name' => 'Body Parts', 'icon' => '🦶'],
            ['name' => 'Colors',     'icon' => '🎨'],
            ['name' => 'Actions',    'icon' => '🏃'],
        ];

        foreach ($categories as $item) {
            $slug = Str::slug($item['name']);

            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'user_id' => 1, // admin
                    'name'     => $item['name'],
                    'slug'     => $slug,
                    'icon'     => $item['icon'] ?? null,
                ]
            );
        }
    }
}
