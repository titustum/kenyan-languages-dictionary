<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str; // Keep if you use it for creating slugs internally
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code', // Added 'code' as it's crucial for language identification in translations
        'slug',
        'description',
        'region',
        'color',
        'image_path', // Path to an image representing the language (e.g., flag)
        'icon',       // Path to an icon representing the language
    ];

    /**
     * The "booted" method of the model.
     * Used to register a creating event listener to auto-generate slug if not provided.
     */
    protected static function booted(): void
    {
        static::creating(function (Language $language) {
            if (empty($language->slug) && !empty($language->name)) {
                $language->slug = Str::slug($language->name);
            }
        });
    }

    /**
     * Get the dictionary translations associated with this language.
     * This is the primary way to access language-specific dictionary content.
     */
    public function dictionaryTranslations(): HasMany
    {
        return $this->hasMany(DictionaryTranslation::class);
    }

    /**
     * Define a relationship if you track which main entries were initially
     * conceptualized or managed with a primary language in mind.
     * (Optional, consider removing if not explicitly needed in your application logic,
     * as DictionaryMainEntry is primarily language-agnostic in concept).
     */
    // public function contributedMainEntries(): HasMany
    // {
    //     // This assumes a 'language_id' exists on dictionary_main_entries
    //     // to denote a 'primary' language for the main entry.
    //     // If not, this relationship can be removed.
    //     return $this->hasMany(DictionaryMainEntry::class, 'language_id');
    // }

    /**
     * Get the route key for the model.
     * Use 'slug' instead of 'id' for clean URLs.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the full URL for the language's image.
     *
     * @return string|null
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    /**
     * Get the full URL for the language's icon.
     *
     * @return string|null
     */
    public function getIconUrlAttribute(): ?string
    {
        return $this->icon ? asset('storage/' . $this->icon) : null;
    }
}