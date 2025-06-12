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

new #[Layout('components.layouts.auth')] class extends Component {
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

<div class="flex flex-col gap-8 p-6 sm:p-8 bg-gray-800 rounded-lg shadow-xl max-w-md mx-auto my-12 animate-fade-in">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-white mb-2">Log in to your account</h2>
        <p class="text-gray-400 text-lg">Enter your email and password below to log in</p>
    </div>

    @if (session('status'))
    <div class="bg-green-500/20 text-green-300 p-3 rounded-md text-center text-sm">
        {{ session('status') }}
    </div>
    @endif

    <form wire:submit="login" class="flex flex-col gap-6">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email address</label>
            <input id="email" wire:model="email" type="email" required autofocus autocomplete="email"
                placeholder="email@example.com"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="relative">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <input id="password" wire:model="password" type="password" {{-- Changed to password type for security --}}
                required autocomplete="current-password" placeholder="Password"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            {{-- This is where you would typically add a "show/hide password" toggle if desired, replacing flux:input
            viewable --}}

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" wire:navigate
                class="absolute end-0 top-0 mt-2 text-sm text-purple-400 hover:text-purple-300 transition-colors">
                Forgot your password?
            </a>
            @endif
            @error('password')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <input id="remember" wire:model="remember" type="checkbox"
                class="h-4 w-4 text-purple-600 border-gray-600 rounded focus:ring-purple-500 bg-gray-700">
            <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-700 text-white font-semibold rounded-md hover:from-purple-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-900 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                Log in
            </button>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="text-center text-sm text-gray-400">
        Don't have an account?
        <a href="{{ route('register') }}" wire:navigate
            class="font-semibold text-purple-400 hover:text-purple-300 transition-colors">Sign up</a>
    </div>
    @endif
</div>

@push('styles')
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
</style>
@endpush