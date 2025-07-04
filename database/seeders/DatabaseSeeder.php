<?php

namespace Database\Seeders;

use App\Models\DictionaryEntry;
use App\Models\User;
use Database\Seeders\CategorySeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@email.com',
            'password' => 'password', // password
        ]);

        // Call seeders in proper order
        $this->call([
            LanguageSeeder::class,
            CategorySeeder::class,
            DictionaryMainEntrySeeder::class,
        ]);

        // DictionaryEntry::factory(100)->create();
    }
}
