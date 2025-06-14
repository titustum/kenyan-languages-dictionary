<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Animals', 'icon' => '🐄'],
            ['name' => 'Food', 'icon' => '🍲'],
            ['name' => 'Greetings', 'icon' => '🙌'],
            ['name' => 'Numbers', 'icon' => '🔢'],
            ['name' => 'Nature', 'icon' => '🌿'],
            ['name' => 'Body Parts', 'icon' => '🦶'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'slug' => Str::slug($cat['name']),
                    'icon' => $cat['icon'] ?? null,
                ]
            );
        }
    }
}

