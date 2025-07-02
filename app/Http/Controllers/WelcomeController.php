<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\User; // Import User model
use App\Models\DictionaryTranslation; // Assuming this model for word count  
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $languages = Language::orderBy('id', 'asc')->get();  

        // Fetch dynamic counts for the landing page statistics
        $total_words = DictionaryTranslation::count(); // Or a custom method if words are complex
        $total_audio_files = DictionaryTranslation::where('audio_path','<>', null)->count(); // Adjust based on how you track audio
        // $total_contributors = User::where('is_contributor', true)->count(); // Assuming a column `is_contributor`
        $total_contributors = User::count(); // Assuming a column `is_contributor`

        return view('welcome', compact('languages', 'total_words', 'total_audio_files', 'total_contributors'));
    }
}