<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\User; // Import User model
use App\Models\Visitor; // Import Visitor model
use App\Models\DictionaryTranslation; // Assuming this model for word count  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $languages = Language::orderBy('id', 'asc')->get();  

        // Fetch dynamic counts for the landing page statistics
        $total_words = DictionaryTranslation::count(); // Or a custom method if words are complex
        $total_audio_files = DictionaryTranslation::where('audio_path','<>', null)->count(); // Adjust based on how you track audio
        // $total_contributors = User::where('is_contributor', true)->count(); // Assuming a column `is_contributor`
        $total_contributors = User::count(); // Assuming a column `is_contributor`

        return view('welcome', compact('languages', 'total_words', 'total_audio_files', 'total_contributors'));
    }

    // register and explore language entries

    public function registerAndExplore(Request $request)
    {
        // Validate the request to ensure 'language' is provided
        $request->validate([
            'language' => 'required|string|exists:languages,slug',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',  
        ]);

         $languageSlug = $request->input('language');
         $language = \App\Models\Language::where('slug', $languageSlug)->first();

        if (!$language) {
            return redirect()->back()->with('error', 'Language not found');
        }
        

        // register the user now based on the name, email, password, and language
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'language_id' => $language->id, // Set the language ID
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the language entries page
        session()->flash('success', 'Registration successful! You can now explore the language entries.');
        
        // Redirect to the language entries page
        return redirect()->route('languages.entries', ['language' => $language->slug]);
    }


    public function selectAndExplore(Request $request)
    {
        // Validate the request
        $request->validate([
            'language' => 'required|string|exists:languages,slug', 
            'category' => 'required|string|in:student,teacher,researcher,developer,native,enthusiast,other',  
        ]);

        // Retrieve language
        $languageSlug = $request->input('language');
        $language = Language::where('slug', $languageSlug)->first();

        if (!$language) {
            return redirect()->back()->with('error', 'Language not found');
        }

        // Log visitor info
        Visitor::create([
            'ip_address'    => $request->ip(),
            'user_agent'    => $request->userAgent(),
            'language_slug' => $language->slug,
            'category'      => $request->input('category'),
            'referrer'      => $request->headers->get('referer'),
        ]);

        // Redirect to the language entries page
        return redirect()->route('languages.entries', ['language' => $language->slug]);
    }
}