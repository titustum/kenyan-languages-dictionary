<?php

use App\Http\Controllers\DictionaryEntryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/contribute', [MainController::class, 'contribute'])->name('contribute');
Route::get('/languages', [MainController::class, 'viewLanguages'])->name('languages.index');
Route::get('/{language:slug}/entries', [MainController::class, 'languageEntries'])->name('languages.entries');
Route::get('/about/{language:slug}', [MainController::class, 'viewLanguage'])->name('languages.show');
Route::post('/storeContribution', [MainController::class, 'storeContribution'])->name('contribute.store');

// explore 
Route::resource('entries', DictionaryEntryController::class);

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
