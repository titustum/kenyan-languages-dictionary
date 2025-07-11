<?php

use App\Http\Controllers\DictionaryEntryController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\WelcomeController; 
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Http\Request;

Route::get('/', WelcomeController::class)->name('home'); 

Route::get('/new-concept', [MainController::class, 'contribute'])->name('contribute.create');
Route::get('/languages', [MainController::class, 'viewLanguages'])->name('languages.index');
Route::get('/{language:slug}/entries', [MainController::class, 'languageEntries'])->name('languages.entries');
Route::get('/{language:slug}/{slug}', [MainController::class, 'languageEntry'])->name('languages.entry');
Route::get('/about/x/{language:slug}/', [MainController::class, 'viewLanguage'])->name('languages.show');
Route::post('/storeContribution', [MainController::class, 'storeContribution'])->name('contribute.store');
Route::get('/contribute', [MainController::class, 'mainConcepts'])->name('concepts.index');
Route::view('/about', 'about')->name('about');


Route::get('/explore-language', 
function (Request $request) { 
    $languageSlug = $request->query('language');
    $language = \App\Models\Language::where('slug', $languageSlug)->first();
    if (!$language) {
        return redirect()->back()->with('error', 'Language not found');
    }
    return redirect()->route('languages.entries', ['language' => $language->slug]);
})->name('redirect.to.language'); 


use App\Http\Controllers\TranslationContributionController; 
// Route for adding a new translation to a specific main entry
Route::get('/contribute/translation/create/{mainEntry:slug_en}', [TranslationContributionController::class, 'create'])
    ->name('contribute.translation.create');

// Route to store the translation (POST request from the form)
Route::post('/contribute/translation', [TranslationContributionController::class, 'store'])
    ->name('contribute.translation.store');
 

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
 





use Illuminate\Support\Facades\Artisan; 


Route::get('/run-artisan/{command}', function ($command, Request $request) {
    $secret = $request->query('key');
    if ($secret !== env('ARTISAN_RUN_SECRET')) {
        abort(403, 'Unauthorized');
    }

    $allowedCommands = [
        'migrate',
        'migrate:fresh',
        'migrate:fresh --seed',
        'db:seed',
        'optimize',
        'cache:clear',
        'config:cache',
        'route:cache',
        'storage:link',
    ];

    if (!in_array($command, $allowedCommands)) {
        abort(400, 'Command not allowed');
    }

    try {
        $options = ['--force' => true];

        // For migrate:fresh you might want to pass extra options here if needed
        Artisan::call($command, $options);

        return response()->json([
            'status' => 'success',
            'command' => $command,
            'output' => Artisan::output(),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ], 500);
    }
});


require __DIR__.'/auth.php';
