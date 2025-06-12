<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'region',
    ];

    // Relation: Language has many dictionary entries
    public function dictionaryEntries()
    {
        return $this->hasMany(DictionaryEntry::class);
    }
}
