<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DictionaryMainEntry extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dictionary_main_entries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'word_en',
        'slug_en',
        'description_en',
        'example_sentence_en',
        'category_id',
        'image_path', // Updated to include image_path
    ];

    /**
     * Get the user who created this main entry.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the category that this main entry belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all translations for this main entry.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(DictionaryTranslation::class, 'main_entry_id');
    }

    /**
     * Get a specific translation for this main entry by language code.
     *
     * @param string $languageCode The language code (e.g., 'sw', 'ny')
     * @return DictionaryTranslation|null
     */
    public function translation(string $languageCode): ?DictionaryTranslation
    {
        return $this->translations()->whereHas('language', function ($query) use ($languageCode) {
            $query->where('code', $languageCode);
        })->first();
    }

    // Accessor for full image URL
    public function getImageUrlAttribute(): ?string
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    /**
     * Get the route key for the model.
     * Use 'slug' instead of 'id' for clean URLs.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}