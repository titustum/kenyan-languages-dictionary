<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class DictionaryEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'user_id',
        'word',
        'slug',
        'translation_en',
        'category',
        'image_path',
        'audio_path',
        'example_sentence',
    ];

    // Relations
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Automatically generate slug before saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($entry) {
            $entry->slug = Str::slug($entry->word);

            $originalSlug = $entry->slug;
            $count = 1;
            while (self::where('slug', $entry->slug)
                ->where('id', '!=', $entry->id)
                ->exists()) {
                $entry->slug = $originalSlug . '-' . $count++;
            }
        });
    }
}
