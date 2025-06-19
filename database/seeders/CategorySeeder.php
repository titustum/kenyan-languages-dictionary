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
            ['name' => 'Greetings',       'icon' => '👋'],
            ['name' => 'Animals',         'icon' => '🐾'],
            ['name' => 'Food',            'icon' => '🍽️'],
            ['name' => 'Sports',          'icon' => '🏅'],
            ['name' => 'People',          'icon' => '🧍‍♂️'],
            ['name' => 'Household Items', 'icon' => '🏠'],
            ['name' => 'Places',          'icon' => '📍'],
            ['name' => 'Clothing',        'icon' => '👗'],
            ['name' => 'Nature',          'icon' => '🌿'],
            ['name' => 'Colors',          'icon' => '🎨'],
            ['name' => 'Body Parts',      'icon' => '🦵'],
            ['name' => 'Vehicles',        'icon' => '🚗'],
            ['name' => 'School',          'icon' => '🎒'],
            ['name' => 'Technology',      'icon' => '💻'],
            ['name' => 'Weather',         'icon' => '🌦️'],
            ['name' => 'Emotions',        'icon' => '😊'],
            ['name' => 'Occupations',     'icon' => '👩‍⚕️'],
            ['name' => 'Tools',           'icon' => '🛠️'],
            ['name' => 'Travel',          'icon' => '✈️'],
            ['name' => 'Time',            'icon' => '⏰'],
            ['name' => 'Music',           'icon' => '🎵'],
        ];

        foreach ($categories as $item) {
            $slug = Str::slug($item['name']);

            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'user_id' => 1, // admin
                    'name'    => $item['name'],
                    'slug'    => $slug,
                    'icon'    => $item['icon'] ?? null,
                ]
            );
        }
    }
}
