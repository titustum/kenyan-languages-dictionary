<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $languages = Language::limit(11)
            ->orderBy('id', 'asc')
            ->get();

        $remainingLanguagesCount = Language::count() - $languages->count();
        return view('welcome', compact('languages', 'remainingLanguagesCount'));
    }
}
