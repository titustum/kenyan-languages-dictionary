<?php

namespace App\Http\Controllers;

use App\Models\DictionaryEntry;
use App\Models\Language;
use Illuminate\Http\Request;

class DictionaryEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = DictionaryEntry::all();
        return view('explore', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DictionaryEntry $dictionaryEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DictionaryEntry $dictionaryEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DictionaryEntry $dictionaryEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DictionaryEntry $dictionaryEntry)
    {
        //
    }

    /**
     * Display entries for a specific language.
     */
    public function entriesByLanguage(Request $request, Language $language)
    {
        $query = $language->dictionaryEntries()->with(['user', 'category']);

        if ($search = $request->get('search')) {
            $query->where('word', 'like', '%' . $search . '%')
                ->orWhere('translation_en', 'like', '%' . $search . '%');
        }

        if ($categorySlug = $request->get('category')) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $entries = $query->latest()->get();

        $categories = \App\Models\Category::orderBy('name')->get();

        return view('languages.entries', compact('language', 'entries', 'categories'));
    }
}
