<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DictionaryMainEntry;
use App\Models\DictionaryTranslation;
use App\Models\Language; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function viewLanguages()
    {
        return view('languages', [
            'languages' => Language::all(),
        ]);
    }


    public function contribute(){
        $languages = Language::all();
        $categories = Category::all(); 
        return view('contribute', compact('languages', 'categories'));
    }

    public function storeContribution(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'word_en' => 'required|string|max:255|unique:dictionary_main_entries,word_en',
            'description_en' => 'nullable|string',
            'example_sentence_en' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image_path' => 'nullable|image|max:2048', // Optional image upload
        ]);

        // Generate slug from word_en
        $slug_en = Str::slug($validated['word_en']);

        // Ensure slug is unique
        $slugCount = DictionaryMainEntry::where('slug_en', $slug_en)->count();
        if ($slugCount > 0) {
            $slug_en .= '-' . ($slugCount + 1);
        }

        // Handle optional image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('dictionary_images', 'public');
        }

        // Create the main entry
        $entry = DictionaryMainEntry::create([
            'user_id' => $validated['user_id'] ?? Auth::id() ?? 1,
            'word_en' => $validated['word_en'],
            'slug_en' => $slug_en,
            'description_en' => $validated['description_en'] ?? null,
            'example_sentence_en' => $validated['example_sentence_en'] ?? null,
            'category_id' => $validated['category_id'],
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', "English word ( $entry->word_en ) concept added successfully!");

    } 
    /**
     * Display entries for a specific language.
     */
    public function languageEntries(Request $request, Language $language)
    {
        $query = $language->dictionaryTranslations()
            ->with(['mainEntry.category']);

        // Apply search filter if present
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('word', 'like', '%' . $search . '%')
                ->orWhereHas('mainEntry', function ($sub) use ($search) {
                    $sub->where('word_en', 'like', '%' . $search . '%');
                });
            });
        }

        // Apply category filter if present
        if ($categorySlug = $request->get('category')) {
            $query->whereHas('mainEntry.category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $entries = $query->latest()->paginate(12);
        $categories = Category::orderBy('name')->get(); 

        return view('entries', compact('language', 'entries', 'categories'));
    }

    public function viewLanguage(Language $language)
    {
        return view('view-language', [
            'language' => $language 
        ]);
    }


    public function mainConcepts()
    {
        $mainEntries = DictionaryMainEntry::with('category')->latest()->paginate(10); // Example pagination
        $categories = Category::orderBy('name')->get(); 
        return view('main-concepts', compact('mainEntries', 'categories'));
    }
}
