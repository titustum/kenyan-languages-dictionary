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
        $languages = Language::orderBy('id', 'asc')
            ->get(); 
        return view('welcome', compact('languages'));
    }
}
