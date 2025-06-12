<?php

namespace Database\Seeders;

use App\Models\DictionaryEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictionaryEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DictionaryEntry::factory()->count(100)->create(); 
    }
}
