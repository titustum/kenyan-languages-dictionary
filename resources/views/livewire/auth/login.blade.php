<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app.guest')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<!-- Login Form Section -->
<div
    class="flex flex-col gap-8 p-6 sm:p-8 bg-white dark:bg-gray-900 rounded-3xl shadow-xl max-w-md mx-auto my-12 backdrop-blur-xl border border-gray-100 dark:border-gray-800 animate__animated animate__fadeIn glass-morphism-strong">

    <!-- Heading -->
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-2">Log in to your account</h2>
        <p class="text-gray-600 dark:text-gray-400 text-lg">Enter your email and password below to log in</p>
    </div>

    <!-- Session Status Message -->
    @if (session('status'))
    <div class="bg-green-500/20 text-green-300 p-3 rounded-md text-center text-sm">
        {{ session('status') }}
    </div>
    @endif

    <!-- Login Form -->
    <form wire:submit="login" class="flex flex-col gap-6">

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                address</label>
            <input id="email" wire:model="email" type="email" required autofocus autocomplete="email"
                placeholder="email@example.com"
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
            <input id="password" wire:model="password" type="password" required autocomplete="current-password"
                placeholder="••••••••"
                class="w-full px-5 py-3 bg-white/10 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 ease-in-out">

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" wire:navigate
                class="absolute right-0 top-0 mt-2 text-sm text-purple-500 hover:text-purple-400 transition-colors">
                Forgot your password?
            </a>
            @endif
            @error('password')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember" wire:model="remember" type="checkbox"
                class="h-4 w-4 text-purple-600 border-gray-600 dark:border-gray-700 rounded focus:ring-purple-500 bg-gray-100 dark:bg-gray-800">
            <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Remember me</label>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-center">
            <button type="submit"
                class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                Log in
            </button>
        </div>
    </form>

    <!-- Register Link -->
    @if (Route::has('register'))
    <div class="text-center text-sm text-gray-500 dark:text-gray-400">
        Don’t have an account?
        <a href="{{ route('register') }}" wire:navigate
            class="font-semibold text-purple-500 hover:text-purple-400 transition-colors">Sign up</a>
    </div>
    @endif
</div>