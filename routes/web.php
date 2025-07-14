<?php

use App\Http\Controllers\DictionaryEntryController; 
use App\Http\Controllers\MainController;
use App\Http\Controllers\WelcomeController; 
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Http\Request;

Route::get('/', [WelcomeController::class, 'index'])->name('home');


Route::get('/languages', [MainController::class, 'viewLanguages'])->name('languages.index');
Route::get('/{language:slug}/entries', [MainController::class, 'languageEntries'])->name('languages.entries');
Route::get('/{language:slug}/{slug}', [MainController::class, 'languageEntry'])->name('languages.entry');
Route::get('/{language:slug}/word/random', [MainController::class, 'randomLanguageEntry'])->name('languages.random_entry');
Route::get('/about/x/{language:slug}/', [MainController::class, 'viewLanguage'])->name('languages.show');
Route::view('/about', 'about')->name('about');
Route::post('/select-explore', [WelcomeController::class, 'selectAndExplore'])->name('select.explore');
Route::post('/register-explore', [WelcomeController::class, 'registerAndExplore'])->name('register.explore');


use App\Http\Controllers\TranslationContributionController; 

Route::get('/new-concept', [MainController::class, 'contribute'])->name('contribute.create');
Route::post('/storeContribution', [MainController::class, 'storeContribution'])->name('contribute.store');
Route::get('/translate', [MainController::class, 'mainConcepts'])->name('concepts.index');

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

    // Define allowed commands and optional arguments
    $allowedCommands = [
        'migrate' => [],
        'migrate:fresh' => [],
        'migrate:fresh:seed' => ['--seed' => true],
        'db:seed' => [],
        'optimize' => [],
        'cache:clear' => [],
        'config:cache' => [],
        'route:cache' => [],
        'storage:link' => [],
    ];

    // Special handling if command is like migrate:fresh:seed
    $args = [];
    if (isset($allowedCommands[$command])) {
        $args = $allowedCommands[$command];
    } else {
        abort(400, 'Command not allowed');
    }

    try {
        $args['--force'] = true; // Add --force to all commands
        Artisan::call(str_replace(':seed', '', $command), $args);

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
