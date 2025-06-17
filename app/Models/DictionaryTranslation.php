<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DictionaryTranslation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dictionary_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'main_entry_id',
        'language_id',
        'word',
        'slug',
        'description',
        'example_sentence',
        'audio_path', // Updated to include audio_path
    ];

    /**
     * Get the main dictionary entry this translation belongs to.
     */
    public function mainEntry(): BelongsTo
    {
        return $this->belongsTo(DictionaryMainEntry::class, 'main_entry_id');
    }

    /**
     * Get the language this translation is for.
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    // Accessor for full audio URL
    public function getAudioUrlAttribute(): ?string
    {
        return $this->audio_path ? asset('storage/' . $this->audio_path) : null;
    }
}