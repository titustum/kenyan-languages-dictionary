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

        $entries = $query->latest()->paginate(30);


        $categories = Category::orderBy('name')->get(); 

        return view('entries', compact('language', 'entries', 'categories'));
    }

    public function viewLanguage(Request $request, Language $language)
    {
        return view('view-language', [
            'language' => $language,
            'page_title' => 'About ' . $language->name, // Dynamic title for the layout
        ]);
    }


    // public function mainConcepts(Request $request)
    // { 

    //     $language = null;

    //     if(request()->get('lang')) { //slug as slug is used to find specified langauge
    //         $langSlug = request()->get('lang');
    //         $language = Language::find($langSlug);
    //         if (!$language) {
    //             return redirect()->back()->with('error', 'Language not found.');
    //         }
    //     } else {
    //         $langSlug = null;
    //     }

    //     if ($categorySlug = $request->get('category')) {
    //         $mainEntries = DictionaryMainEntry::with('category')
    //             ->whereHas('category', function ($query) use ($categorySlug) {
    //                 $query->where('slug', $categorySlug);
    //             })
    //             ->latest()
    //             ->paginate(20); // Example pagination
    //     } else {
    //         $mainEntries = DictionaryMainEntry::with('category')->latest()->paginate(20); // Example pagination
    //     } 
    //     $categories = Category::orderBy('name')->get(); 
    //     $languages = Language::get(['id','name']);
    //     return view('main-concepts', compact('mainEntries', 'categories', 'languages', 'langSlug', 'language'));
    // }


    public function mainConcepts(Request $request)
    {
        // Load all categories and languages for the UI
        $categories = Category::orderBy('name')->get();
        $languages = Language::select('id', 'name', 'slug')->get();

        // Handle optional language selection
        $langSlug = $request->get('lang');
        $language = $langSlug ? Language::where('slug', $langSlug)->first() : null;

        if ($langSlug && !$language) {
            return redirect()->back()->with('error', 'Language not found.');
        }

        // Start building the query
        $query = DictionaryMainEntry::with('category');

        // Filter by category if provided
        if ($categorySlug = $request->get('category')) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Apply search if provided
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('word_en', 'like', "%{$search}%")
                ->orWhere('description_en', 'like', "%{$search}%")
                ->orWhere('example_sentence_en', 'like', "%{$search}%");
            });
        }

        // Paginate results, preserving query parameters
        $mainEntries = $query->latest()->paginate(20)->appends($request->query());

        // Return view with all data needed for Blade
        return view('main-concepts', compact(
            'mainEntries',
            'categories',
            'languages',
            'langSlug',
            'language'
        ));
    }


    public function languageEntry(Request $request, Language $language,  $slug = null) {
        //view translated language entry
        $translatedWord = $language->dictionaryTranslations->where('slug', $slug)->first();
        $mainEntry = DictionaryMainEntry::find($translatedWord->main_entry_id) ;
        // dd($mainEntry);
        return view('language-entry',
        compact(
            "language",
            "mainEntry",
            "translatedWord"
        ));
    }

    public function randomLanguageEntry(Request $request, Language $language) {
        //view translated language entry


        $translatedRandomWord =  $language->dictionaryTranslations->random();


        $translatedWord = $language->dictionaryTranslations()
            ->where('id', $translatedRandomWord->id)
            ->first();

        if (!$translatedWord) {
            return redirect()->back()->with('error', 'No random word found for this language.');
        }
        // Find the ma`in entry for the translated word
        
        return redirect()->route('languages.entry', [
            'language' => $language->slug,
            'slug' => $translatedWord->slug
        ]);
    }

}
