<?php

use App\Http\Controllers\DictionaryEntryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/new-concept', [MainController::class, 'contribute'])->name('contribute.create');
Route::get('/languages', [MainController::class, 'viewLanguages'])->name('languages.index');
Route::get('/{language:slug}/entries', [MainController::class, 'languageEntries'])->name('languages.entries');
Route::get('/about/{language:slug}', [MainController::class, 'viewLanguage'])->name('languages.show');
Route::post('/storeContribution', [MainController::class, 'storeContribution'])->name('contribute.store');
Route::get('/contribute', [MainController::class, 'mainConcepts'])->name('concepts.index');
Route::view('/about', 'about')->name('about');


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
 


require __DIR__.'/auth.php';
