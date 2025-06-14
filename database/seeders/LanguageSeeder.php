<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            [
                'name' => 'Kikuyu',
                'description' => 'Spoken by the Kikuyu people in central Kenya.',
                'region' => 'Central Kenya',
                'color' => 'yellow',
                'icon' => '🌄',
            ],
            [
                'name' => 'Luhya',
                'description' => 'Used by the Luhya community in Western Kenya.',
                'region' => 'Western Kenya',
                'color' => 'green',
                'icon' => '🌿',
            ],
            [
                'name' => 'Luo',
                'description' => 'Native to the Luo people around Lake Victoria.',
                'region' => 'Nyanza (Western Kenya)',
                'color' => 'blue',
                'icon' => '🌊',
            ],
            [
                'name' => 'Kalenjin',
                'description' => 'Spoken by the Kalenjin communities in the Rift Valley.',
                'region' => 'Rift Valley',
                'color' => 'emerald',
                'icon' => '⛰️',
            ],
            [
                'name' => 'Kamba',
                'description' => 'Used by the Kamba people of Eastern Kenya.',
                'region' => 'Eastern Kenya',
                'color' => 'orange',
                'icon' => '🌾',
            ],
            [
                'name' => 'Swahili',
                'description' => 'National language of Kenya, widely spoken across East Africa.',
                'region' => 'Nationwide',
                'color' => 'teal',
                'icon' => '🌍',
            ],
            [
                'name' => 'Meru',
                'description' => 'Spoken by the Meru people of Mount Kenya region.',
                'region' => 'Eastern/Central Kenya',
                'color' => 'lime',
                'icon' => '🌳',
            ],
            [
                'name' => 'Taita',
                'description' => 'Language of the Taita people in the Taita Hills.',
                'region' => 'Coastal Kenya',
                'color' => 'rose',
                'icon' => '🏞️',
            ],
        ];

        foreach ($languages as $lang) {
            $slug = Str::slug($lang['name']);

            Language::updateOrCreate(
                ['slug' => $slug],
                [
                    'user_id' => 1,
                    'name' => $lang['name'],
                    'slug' => $slug,
                    'description' => $lang['description'],
                    'region' => $lang['region'],
                    'color' => $lang['color'],
                    'icon' => $lang['icon'],
                ]
            );
        }
    }
}
