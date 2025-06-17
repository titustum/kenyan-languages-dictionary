<?php

use App\Http\Controllers\DictionaryEntryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', WelcomeController::class)->name('home');
Route::get('/contribute', [MainController::class, 'contribute'])->name('contribute');
Route::post('/storeContribution', [MainController::class, 'storeContribution'])->name('contribute.store');

// explore
Route::resource('languages', LanguageController::class);
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

Route::get('/{language:slug}/entries', [DictionaryEntryController::class, 'entriesByLanguage'])
    ->name('languages.entries');


require __DIR__.'/auth.php';
