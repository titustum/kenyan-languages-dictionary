<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Language;


new #[Layout('components.layouts.app.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $remember = false;

    //languages
    public $languages = null;

    public function mount(): void
    {
        $this->email = Str::lower($this->email);
        $this->languages = Language::get('name', 'slug')->sortBy('name');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'exists:languages,slug'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<!-- Register Form Section -->
<div
    class="flex flex-col gap-8 p-6 sm:p-8 bg-white dark:bg-gray-900 rounded-3xl shadow-xl max-w-md mx-auto my-12 animate__animated animate__fadeIn glass-morphism-strong backdrop-blur-xl border border-gray-100 dark:border-gray-800">

    <!-- Heading -->
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-2">Create Your Account</h2>
        <p class="text-gray-600 dark:text-gray-400 text-lg">Join <span
                class="text-purple-600 font-bold">Motherlang</span> and start exploring Kenyan languages!</p>
    </div>

    <!-- Form -->
    <form wire:submit="register" class="flex flex-col gap-6">

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
            <input id="name" wire:model="name" type="text" required autofocus autocomplete="name"
                placeholder="Your Name"
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
            @error('name')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                Address</label>
            <input id="email" wire:model="email" type="email" required autocomplete="email"
                placeholder="email@example.com"
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- select language here --}}
        <div>
            <label for="language"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Language</label>
            <select id="language" wire:model="language" required
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
                <option value="">Select a language</option>
                @foreach ($languages as $lang)
                <option value="{{ $lang->slug }}">{{ $lang->name }}</option>
                @endforeach
            </select>
            @error('language')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
            <input id="password" wire:model="password" type="password" required autocomplete="new-password"
                placeholder="••••••••"
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
            @error('password')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm Password</label>
            <input id="password_confirmation" wire:model="password_confirmation" type="password" required
                autocomplete="new-password" placeholder="••••••••"
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
            @error('password_confirmation')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-center">
            <button type="submit"
                class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                Register
            </button>
        </div>
    </form>

    <!-- Footer -->
    <div class="text-center text-sm text-gray-500 dark:text-gray-400">
        Already have an account?
        <a href="{{ route('login') }}" wire:navigate
            class="font-semibold text-purple-500 hover:text-purple-400 transition-colors">Log in</a>
    </div>
</div>