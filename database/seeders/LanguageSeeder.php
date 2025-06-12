<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            [
                'name' => 'Kikuyu',
                'description' => 'Spoken by the Kikuyu people in central Kenya.',
                'region' => 'Central Kenya',
            ],
            [
                'name' => 'Luhya',
                'description' => 'Used by the Luhya community in Western Kenya.',
                'region' => 'Western Kenya',
            ],
            [
                'name' => 'Luo',
                'description' => 'Native to the Luo people around Lake Victoria.',
                'region' => 'Nyanza (Western Kenya)',
            ],
            [
                'name' => 'Kalenjin',
                'description' => 'Spoken by the Kalenjin communities in the Rift Valley.',
                'region' => 'Rift Valley',
            ],
            [
                'name' => 'Kamba',
                'description' => 'Used by the Kamba people of Eastern Kenya.',
                'region' => 'Eastern Kenya',
            ],
            [
                'name' => 'Swahili',
                'description' => 'National language of Kenya, widely spoken across East Africa.',
                'region' => 'Nationwide',
            ],
            [
                'name' => 'Meru',
                'description' => 'Spoken by the Meru people of Mount Kenya region.',
                'region' => 'Eastern/Central Kenya',
            ],
            [
                'name' => 'Taita',
                'description' => 'Language of the Taita people in the Taita Hills.',
                'region' => 'Coastal Kenya',
            ],
        ];

        foreach ($languages as $lang) {
            Language::updateOrCreate(
                ['slug' => Str::slug($lang['name'])],
                [
                    'name' => $lang['name'],
                    'slug' => Str::slug($lang['name']),
                    'description' => $lang['description'],
                    'region' => $lang['region'],
                ]
            );
        }
    }
}
