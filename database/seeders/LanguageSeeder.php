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
                'description' => 'The Kikuyu language, also known as Gikuyu, is a Bantu language spoken by the Kikuyu people in Central Kenya, particularly in the counties surrounding Mount Kenya. It is one of the most widely spoken indigenous languages in Kenya and has deep historical significance as the language of the Mau Mau resistance movement during Kenya’s struggle for independence. Kikuyu is rich in proverbs, oral narratives, and poetry that reflect the community’s agrarian lifestyle, social structures, and ancestral wisdom. The language plays an influential role in Kenyan politics, literature, and media.',
                'region' => 'Central Kenya',
                'color' => 'yellow',
                'icon' => '🌄'
            ],
            [
                'name' => 'Luhya',
                'description' => 'Luhya is a major Bantu language cluster spoken by the Luhya people in Western Kenya, primarily in the counties of Kakamega, Bungoma, Vihiga, and Busia. It comprises over a dozen dialects, including Bukusu, Maragoli, and Wanga, each with distinct linguistic features. The Luhya are known for their vibrant music traditions, especially the Isukuti drums, and elaborate cultural ceremonies. The language plays a vital role in preserving the history, norms, and values of one of Kenya’s largest ethnic groups.',
                'region' => 'Western Kenya',
                'color' => 'green',
                'icon' => '🌿'
            ],
            [
                'name' => 'Luo',
                'description' => 'Luo is a Nilotic language spoken by the Luo people in the Nyanza region, around Lake Victoria in Western Kenya. It belongs to the Western Nilotic branch of the Nilo-Saharan language family. The Luo language is noted for its tonal qualities and poetic expressions. It serves as a strong vehicle for oral literature, music, and political discourse, with prominent contributions to Kenya’s post-independence cultural and political history. The Luo are known for their storytelling, music genres like Benga, and reverence for ancestral traditions.',
                'region' => 'Nyanza (Western Kenya)',
                'color' => 'blue',
                'icon' => '🌊'
            ],
            [
                'name' => 'Kalenjin',
                'description' => 'Kalenjin is not a single language but a group of closely related Southern Nilotic dialects spoken across the Rift Valley. It includes sub-dialects such as Nandi, Kipsigis, Tugen, and Marakwet. The Kalenjin people are globally renowned for their extraordinary achievements in long-distance running. Linguistically, the Kalenjin languages are known for complex verb systems and rich oral traditions. Culturally, they emphasize age-set systems, elaborate initiation rites, and indigenous knowledge in agriculture and herbal medicine.',
                'region' => 'Rift Valley',
                'color' => 'amber',
                'icon' => '⛰️'
            ],
            [
                'name' => 'Kamba',
                'description' => 'Kamba, or Kikamba, is a Bantu language spoken by the Kamba people who inhabit the semi-arid regions of Eastern Kenya. The Kamba are historically known as skilled traders, herbalists, and craftsmen, especially in wood carving and metalwork. Kikamba is used widely in education, church services, and local media. The language is characterized by expressive idioms, folktales, and proverbs that carry deep philosophical meanings, especially in matters of community, morality, and the natural world.',
                'region' => 'Eastern Kenya',
                'color' => 'orange',
                'icon' => '🌾'
            ],
            [
                'name' => 'Swahili',
                'description' => 'Swahili (Kiswahili) is a widely spoken Bantu language that serves as Kenya’s national and official language alongside English. It originated along the East African coast as a trade lingua franca and incorporates vocabulary from Arabic, Persian, Portuguese, and later, English. Swahili is not only central to communication in Kenya but also a unifying language across East Africa. It is taught in schools, used in government and media, and increasingly in literature, film, and music. Its cultural depth is evident in coastal poetry, storytelling, and Swahili architecture and cuisine.',
                'region' => 'Nationwide',
                'color' => 'indigo',
                'icon' => '🌍'
            ],
            [
                'name' => 'Meru',
                'description' => 'Meru (Kĩmĩĩrũ) is a Bantu language spoken by the Meru people, who live on the northeastern slopes of Mount Kenya. The Meru community is organized into several subgroups (e.g., Igembe, Tigania, Imenti), each with slight dialectal variations. The language is central to the Meru people’s strong clan identity, oral traditions, and agricultural lifestyle. It features prominently in rituals, proverbs, and songs, particularly those associated with farming cycles and ancestral rites.',
                'region' => 'Eastern/Central Kenya',
                'color' => 'lime',
                'icon' => '🌳'
            ],
            [
                'name' => 'Taita',
                'description' => 'Taita is a Bantu language spoken by the Taita people in the Taita Hills region of Coastal Kenya. Also known as Dawida, the language has close ties to the Sagalla and Kasigau dialects. The Taita people have a deep spiritual relationship with their hilly landscape, which is reflected in their traditional beliefs, burial customs, and sacred sites. The language preserves oral histories passed down for generations, often through song, storytelling, and agricultural metaphors.',
                'region' => 'Coastal Kenya',
                'color' => 'cyan',
                'icon' => '🏞️'
            ],
            [
                'name' => 'Embu',
                'description' => 'Embu is a Bantu language spoken by the Embu people who inhabit the southeastern region of Mount Kenya. The language is closely related to Kikuyu and Meru, forming part of the Central Kenya Bantu cluster. Embu is used in traditional ceremonies, religious functions, and community gatherings. It is notable for its extensive use of metaphoric expressions and communal storytelling, particularly in teaching cultural values and ancestral knowledge to younger generations.',
                'region' => 'Eastern Kenya',
                'color' => 'rose',
                'icon' => '🌸'
            ],
            [
                'name' => 'Somali',
                'description' => 'Somali is a Cushitic language spoken by the Somali people in Northern Kenya, particularly in the northeastern region bordering Somalia. It is part of the larger Afro-Asiatic language family and has a rich oral tradition, including poetry and storytelling. The Somali language is characterized by its use of alliteration and metaphor, reflecting the community’s nomadic pastoral lifestyle. It plays a crucial role in cultural identity, social cohesion, and political discourse among the Somali people.',
                'region' => 'Northeastern Kenya',
                'color' => 'brown',
                'icon' => '🐪'
            ],

            // ['name' => 'Borana', 'description' => 'Borana is a Cushitic language spoken by the Borana community in Northern Kenya. It is part of the Oromo language group and is closely tied to nomadic pastoral traditions.', 'region' => 'Northern Kenya', 'color' => 'red', 'icon' => '🔥'],
            // ['name' => 'Pokot', 'description' => 'Pokot is a Southern Nilotic language spoken by the Pokot community in Northwestern Kenya. It reflects their semi-nomadic lifestyle and rich oral storytelling.', 'region' => 'Northwestern Kenya', 'color' => 'yellow', 'icon' => '🏜️'],
            // ['name' => 'Rendille', 'description' => 'Rendille is a Cushitic language spoken by the Rendille people in Northern Kenya. It is traditionally associated with camel pastoralism and desert survival culture.', 'region' => 'Northern Kenya', 'color' => 'orange', 'icon' => '🐪'],
            // ['name' => 'Samburu', 'description' => 'Samburu is a Nilotic language closely related to Maasai, spoken by the Samburu people. It is known for its oral poetry, warrior culture, and colorful attire.', 'region' => 'Northern Kenya', 'color' => 'red', 'icon' => '🦒'],
            // ['name' => 'Turkana', 'description' => 'Turkana is a Nilotic language spoken by the Turkana people of Northern Kenya. The language embodies the pastoralist lifestyle in one of Kenya’s most arid regions.', 'region' => 'Northern Kenya', 'color' => 'purple', 'icon' => '🏜️'],
            // ['name' => 'Mijikenda', 'description' => 'Mijikenda refers to a group of Bantu languages spoken by the Mijikenda peoples along the coast. These communities are known for the sacred kaya forests and rich cultural heritage.', 'region' => 'Coastal Kenya', 'color' => 'teal', 'icon' => '🌴'],
            // ['name' => 'Swahili (Mijikenda dialect)', 'description' => 'A dialect of Swahili spoken among the Mijikenda people, reflecting coastal influences and localized vocabulary.', 'region' => 'Coastal Kenya', 'color' => 'blue', 'icon' => '🌊'],
            // ['name' => 'El Molo', 'description' => 'El Molo is a nearly extinct language spoken by the El Molo community around Lake Turkana. It is a unique Cushitic language with only a few speakers remaining.', 'region' => 'Northern Kenya', 'color' => 'gray', 'icon' => '🐟'],
            // ['name' => 'Sabaot', 'description' => 'Sabaot is a Nilotic language spoken by communities around Mount Elgon. It is closely related to Kalenjin and rich in traditional songs and rituals.', 'region' => 'Mount Elgon area', 'color' => 'green', 'icon' => '⛰️'],
            // ['name' => 'Tugen', 'description' => 'Tugen is a Southern Nilotic language spoken in the Rift Valley. It is one of the sub-groups of the larger Kalenjin language cluster.', 'region' => 'Rift Valley', 'color' => 'amber', 'icon' => '🌾'],
            // ['name' => 'Nandi', 'description' => 'Nandi is a Southern Nilotic language and a major Kalenjin dialect spoken in the highlands of the Rift Valley. It has historical significance in Kenya’s independence movement.', 'region' => 'Rift Valley', 'color' => 'yellow', 'icon' => '🌄'],
            // ['name' => 'Kipsigis', 'description' => 'Kipsigis is the most spoken Kalenjin dialect in Kenya. It plays a central role in the cultural practices and identity of the Kipsigis people.', 'region' => 'Rift Valley', 'color' => 'orange', 'icon' => '🌿'],
            // ['name' => 'Marakwet', 'description' => 'Marakwet is spoken by one of the smaller Kalenjin sub-groups and is known for unique cultural customs and agricultural systems.', 'region' => 'Rift Valley', 'color' => 'yellow', 'icon' => '🌄'],
            // ['name' => 'Sukuma', 'description' => 'Sukuma is a Bantu language predominantly spoken in Tanzania but also present in parts of Kenya. It is known for its expansive speaker base and cultural music.', 'region' => 'Western Kenya', 'color' => 'green', 'icon' => '🍃'],
            // ['name' => 'Gusii', 'description' => 'Gusii (or Ekegusii) is a Bantu language spoken by the Kisii people of Western Kenya. It is widely used in local media and education in the region.', 'region' => 'Western Kenya', 'color' => 'purple', 'icon' => '🍇'],
            // ['name' => 'Kurya', 'description' => 'Kurya is a Bantu language spoken by the Kurya people in Kenya and Tanzania. It features strong clan identities and cultural practices.', 'region' => 'Western Kenya', 'color' => 'red', 'icon' => '🌺'],
            // ['name' => 'Suba', 'description' => 'Suba is a Bantu language spoken near Lake Victoria. It is endangered and efforts are being made to revitalize it through education and documentation.', 'region' => 'Western Kenya', 'color' => 'blue', 'icon' => '🌊'],
            // ['name' => 'Orma', 'description' => 'Spoken by the Orma community.', 'region' => 'Coastal Kenya', 'color' => 'teal', 'icon' => '🏝️'],
            // ['name' => 'Giriama', 'description' => 'Language of the Giriama people.', 'region' => 'Coastal Kenya', 'color' => 'cyan', 'icon' => '🌴'],
            // ['name' => 'Digo', 'description' => 'Spoken by the Digo community.', 'region' => 'Coastal Kenya', 'color' => 'blue', 'icon' => '🏖️'],
            // ['name' => 'Bajuni', 'description' => 'Language of the Bajuni people.', 'region' => 'Coastal Kenya', 'color' => 'indigo', 'icon' => '⛵'],
            // ['name' => 'Elgeyo', 'description' => 'Spoken by the Elgeyo people.', 'region' => 'Rift Valley', 'color' => 'yellow', 'icon' => '🌄'],
            // ['name' => 'Pokomo', 'description' => 'Language of the Pokomo community.', 'region' => 'Coastal Kenya', 'color' => 'orange', 'icon' => '🌾'],
            // ['name' => 'Watha', 'description' => 'Spoken by the Watha community.', 'region' => 'Central Kenya', 'color' => 'brown', 'icon' => '🔥'],
            // ['name' => 'Rabai', 'description' => 'Language of the Rabai people.', 'region' => 'Coastal Kenya', 'color' => 'cyan', 'icon' => '🌴'],
            // ['name' => 'Taveta', 'description' => 'Spoken by the Taveta community.', 'region' => 'Coastal Kenya', 'color' => 'green', 'icon' => '🌳'],
            // ['name' => 'Gikuyu', 'description' => 'Another term for Kikuyu.', 'region' => 'Central Kenya', 'color' => 'yellow', 'icon' => '🌄'],
            // ['name' => 'Njemps', 'description' => 'Language spoken by the Njemps people.', 'region' => 'Rift Valley', 'color' => 'amber', 'icon' => '⛰️'],
            // ['name' => 'Ilchamus', 'description' => 'Spoken by the Ilchamus people.', 'region' => 'Rift Valley', 'color' => 'orange', 'icon' => '⛰️'],
            // ['name' => 'Burji', 'description' => 'Language of the Burji people.', 'region' => 'Southern Kenya', 'color' => 'red', 'icon' => '🔥'],
            // ['name' => 'Dasenech', 'description' => 'Spoken by the Dasenech people.', 'region' => 'Northern Kenya', 'color' => 'gray', 'icon' => '🏜️'],
            // ['name' => 'Boni', 'description' => 'Language of the Boni people.', 'region' => 'Coastal Kenya', 'color' => 'teal', 'icon' => '🌴'],
            // ['name' => 'Gabra', 'description' => 'Spoken by the Gabra community.', 'region' => 'Northern Kenya', 'color' => 'brown', 'icon' => '🐪'],
        ];

        foreach ($languages as $lang) {
            $slug = Str::slug($lang['name']);

            Language::updateOrCreate(
                ['slug' => $slug],
                [
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
