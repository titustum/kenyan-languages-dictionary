<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DictionaryEntry;
use App\Models\Language; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function contribute(){
        $languages = Language::all();
        $categories = Category::all(); 
        return view('contribute', compact('languages', 'categories'));
    }

    public function storeContribution(Request $request) { 
        // Validate input
        $request->validate([
            'language_id'      => 'required|exists:languages,id',
            'word'             => 'required|string|max:255',
            'translation_en'   => 'required|string|max:255',
            'category_id'      => 'required|exists:categories,id',
            'example_sentence' => 'nullable|string',
            'image_path'       => 'nullable|image|max:2048', // max 2MB
            'audio_path'       => 'nullable|mimes:mp3,wav,ogg|max:5120', // max 5MB
        ]);

        // Create slug
        $slug = Str::slug($request->word);

        // Ensure slug is unique
        if (DictionaryEntry::where('slug', $slug)->exists()) { 
            $slug .= '-' . uniqid();
        }

        // Handle file uploads
        $imagePath = null;
        $audioPath = null;

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/dictionary', 'public');
        }

        if ($request->hasFile('audio_path')) {
            $audioPath = $request->file('audio_path')->store('audio/dictionary', 'public');
        }

        // Save to DB
        DictionaryEntry::create([
            'language_id'      => $request->language_id,
            'user_id'          => Auth::id() ?? 1, // fallback to admin
            'word'             => $request->word,
            'slug'             => $slug,
            'translation_en'   => $request->translation_en,
            'category_id'      => $request->category_id,
            'example_sentence' => $request->example_sentence,
            'image_path'       => $imagePath,
            'audio_path'       => $audioPath,
        ]);

        return redirect()->back()->with('success', 'Word successfully contributed!');
    } 
}
