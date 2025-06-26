<?php

namespace App\Http\Controllers;

use App\Models\DictionaryMainEntry;
use App\Models\DictionaryTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
 use Illuminate\Database\QueryException;

class TranslationContributionController extends Controller
{
    /**
     * Show the form for creating a new translation for a specific main entry.
     *
     * @param  \App\Models\DictionaryMainEntry $mainEntry
     * @return \Illuminate\View\View
     */
    public function create(DictionaryMainEntry $mainEntry)
    {
        $languages = Language::orderBy('name')->get();
        return view('translations.create', compact('mainEntry', 'languages'));
    }

    /**
     * Store a newly created translation in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     

    public function store(Request $request)
    {
        $validated = $request->validate([
            'main_entry_id' => 'required|exists:dictionary_main_entries,id',
            'language_id' => 'required|exists:languages,id',
            'word' => 'required|string|max:255',
            'description' => 'nullable|string',
            'example_sentence' => 'nullable|string',
            'audio_path' => 'nullable|file|mimes:mp3,wav,ogg|max:5120',
        ]);

        $slug = Str::slug($validated['word']);
        $exists = DictionaryTranslation::where('language_id', $validated['language_id'])
                                    ->where('slug', $slug)
                                    ->exists();
        if ($exists) {
            $slug .= '-' . uniqid();
        }

        $audioPath = null;
        if ($request->hasFile('audio_path')) {
            $audioPath = $request->file('audio_path')->store('translation_audio', 'public');
        }

        try {
            DictionaryTranslation::updateOrCreate(
                [
                    'main_entry_id' => $validated['main_entry_id'],
                    'language_id' => $validated['language_id'],
                ], 
                [
                    'word' => $validated['word'],
                    'slug' => $slug,
                    'description' => $validated['description'] ?? null,
                    'example_sentence' => $validated['example_sentence'] ?? null,
                    'audio_path' => $audioPath,
                ]);

            return redirect()->back()->with('success', 'Translation added/updated successfully.');

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                // Unique constraint violation
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'language_id' => 'A translation already exists for this language and concept.',
                    ]);
            }

            // Re-throw if it's a different error
            throw $e;
        }
    }

}