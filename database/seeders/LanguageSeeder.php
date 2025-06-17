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
            ['name' => 'Kikuyu', 'description' => 'Spoken by the Kikuyu people in central Kenya.', 'region' => 'Central Kenya', 'color' => 'yellow', 'icon' => '🌄'],
            ['name' => 'Luhya', 'description' => 'Used by the Luhya community in Western Kenya.', 'region' => 'Western Kenya', 'color' => 'green', 'icon' => '🌿'],
            ['name' => 'Luo', 'description' => 'Native to the Luo people around Lake Victoria.', 'region' => 'Nyanza (Western Kenya)', 'color' => 'blue', 'icon' => '🌊'],
            ['name' => 'Kalenjin', 'description' => 'Spoken by the Kalenjin communities in the Rift Valley.', 'region' => 'Rift Valley', 'color' => 'amber', 'icon' => '⛰️'],
            ['name' => 'Kamba', 'description' => 'Used by the Kamba people of Eastern Kenya.', 'region' => 'Eastern Kenya', 'color' => 'orange', 'icon' => '🌾'],
            ['name' => 'Swahili', 'description' => 'National language of Kenya, widely spoken across East Africa.', 'region' => 'Nationwide', 'color' => 'indigo', 'icon' => '🌍'],
            ['name' => 'Meru', 'description' => 'Spoken by the Meru people of Mount Kenya region.', 'region' => 'Eastern/Central Kenya', 'color' => 'lime', 'icon' => '🌳'],
            ['name' => 'Taita', 'description' => 'Language of the Taita people in the Taita Hills.', 'region' => 'Coastal Kenya', 'color' => 'cyan', 'icon' => '🏞️'],
            ['name' => 'Embu', 'description' => 'Language spoken by the Embu community.', 'region' => 'Eastern Kenya', 'color' => 'rose', 'icon' => '🌸'],
            ['name' => 'Borana', 'description' => 'Language of the Borana people.', 'region' => 'Northern Kenya', 'color' => 'red', 'icon' => '🔥'],
            ['name' => 'Pokot', 'description' => 'Spoken by the Pokot community.', 'region' => 'Northwestern Kenya', 'color' => 'yellow', 'icon' => '🏜️'],
            ['name' => 'Rendille', 'description' => 'Used by the Rendille people.', 'region' => 'Northern Kenya', 'color' => 'orange', 'icon' => '🐪'],
            ['name' => 'Samburu', 'description' => 'Language of the Samburu community.', 'region' => 'Northern Kenya', 'color' => 'red', 'icon' => '🦒'],
            ['name' => 'Turkana', 'description' => 'Spoken by the Turkana people.', 'region' => 'Northern Kenya', 'color' => 'purple', 'icon' => '🏜️'],
            ['name' => 'Mijikenda', 'description' => 'Language of the Mijikenda people.', 'region' => 'Coastal Kenya', 'color' => 'teal', 'icon' => '🌴'],
            ['name' => 'Swahili (Mijikenda dialect)', 'description' => 'Coastal Swahili dialect.', 'region' => 'Coastal Kenya', 'color' => 'blue', 'icon' => '🌊'],
            ['name' => 'El Molo', 'description' => 'Language of the El Molo people.', 'region' => 'Northern Kenya', 'color' => 'gray', 'icon' => '🐟'],
            ['name' => 'Sabaot', 'description' => 'Spoken by the Sabaot community.', 'region' => 'Mount Elgon area', 'color' => 'green', 'icon' => '⛰️'],
            ['name' => 'Tugen', 'description' => 'Language of the Tugen people.', 'region' => 'Rift Valley', 'color' => 'amber', 'icon' => '🌾'],
            ['name' => 'Nandi', 'description' => 'Spoken by the Nandi community.', 'region' => 'Rift Valley', 'color' => 'yellow', 'icon' => '🌄'],
            ['name' => 'Kipsigis', 'description' => 'Used by the Kipsigis people.', 'region' => 'Rift Valley', 'color' => 'orange', 'icon' => '🌿'],
            ['name' => 'Marakwet', 'description' => 'Language of the Marakwet community.', 'region' => 'Rift Valley', 'color' => 'yellow', 'icon' => '🌄'],
            ['name' => 'Sukuma', 'description' => 'Spoken by the Sukuma people (mostly Tanzania, but also in Kenya).', 'region' => 'Western Kenya', 'color' => 'green', 'icon' => '🍃'],
            ['name' => 'Gusii', 'description' => 'Language of the Kisii community.', 'region' => 'Western Kenya', 'color' => 'purple', 'icon' => '🍇'],
            ['name' => 'Kurya', 'description' => 'Spoken by the Kurya people.', 'region' => 'Western Kenya', 'color' => 'red', 'icon' => '🌺'],
            ['name' => 'Suba', 'description' => 'Language of the Suba people near Lake Victoria.', 'region' => 'Western Kenya', 'color' => 'blue', 'icon' => '🌊'],
            ['name' => 'Orma', 'description' => 'Spoken by the Orma community.', 'region' => 'Coastal Kenya', 'color' => 'teal', 'icon' => '🏝️'],
            ['name' => 'Giriama', 'description' => 'Language of the Giriama people.', 'region' => 'Coastal Kenya', 'color' => 'cyan', 'icon' => '🌴'],
            ['name' => 'Digo', 'description' => 'Spoken by the Digo community.', 'region' => 'Coastal Kenya', 'color' => 'blue', 'icon' => '🏖️'],
            ['name' => 'Bajuni', 'description' => 'Language of the Bajuni people.', 'region' => 'Coastal Kenya', 'color' => 'indigo', 'icon' => '⛵'],
            ['name' => 'Elgeyo', 'description' => 'Spoken by the Elgeyo people.', 'region' => 'Rift Valley', 'color' => 'yellow', 'icon' => '🌄'],
            ['name' => 'Pokomo', 'description' => 'Language of the Pokomo community.', 'region' => 'Coastal Kenya', 'color' => 'orange', 'icon' => '🌾'],
            ['name' => 'Watha', 'description' => 'Spoken by the Watha community.', 'region' => 'Central Kenya', 'color' => 'brown', 'icon' => '🔥'],
            ['name' => 'Rabai', 'description' => 'Language of the Rabai people.', 'region' => 'Coastal Kenya', 'color' => 'cyan', 'icon' => '🌴'],
            ['name' => 'Taveta', 'description' => 'Spoken by the Taveta community.', 'region' => 'Coastal Kenya', 'color' => 'green', 'icon' => '🌳'],
            ['name' => 'Gikuyu', 'description' => 'Another term for Kikuyu.', 'region' => 'Central Kenya', 'color' => 'yellow', 'icon' => '🌄'],
            ['name' => 'Njemps', 'description' => 'Language spoken by the Njemps people.', 'region' => 'Rift Valley', 'color' => 'amber', 'icon' => '⛰️'],
            ['name' => 'Ilchamus', 'description' => 'Spoken by the Ilchamus people.', 'region' => 'Rift Valley', 'color' => 'orange', 'icon' => '⛰️'],
            ['name' => 'Burji', 'description' => 'Language of the Burji people.', 'region' => 'Southern Kenya', 'color' => 'red', 'icon' => '🔥'],
            ['name' => 'Dasenech', 'description' => 'Spoken by the Dasenech people.', 'region' => 'Northern Kenya', 'color' => 'gray', 'icon' => '🏜️'],
            ['name' => 'Boni', 'description' => 'Language of the Boni people.', 'region' => 'Coastal Kenya', 'color' => 'teal', 'icon' => '🌴'],
            ['name' => 'Gabra', 'description' => 'Spoken by the Gabra community.', 'region' => 'Northern Kenya', 'color' => 'brown', 'icon' => '🐪'],
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
