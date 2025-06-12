<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-8 p-6 sm:p-8 bg-gray-800 rounded-lg shadow-xl max-w-md mx-auto my-12 animate-fade-in">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-white mb-2">Create Your Account</h2>
        <p class="text-gray-400 text-lg">Join Lugha and start exploring Kenyan languages!</p>
    </div>

    <form wire:submit="register" class="flex flex-col gap-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
            <input id="name" wire:model="name" type="text" required autofocus autocomplete="name"
                placeholder="Your Name"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            @error('name')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email address</label>
            <input id="email" wire:model="email" type="email" required autocomplete="email"
                placeholder="email@example.com"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <input id="password" wire:model="password" type="password" required autocomplete="new-password"
                placeholder="Password"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            @error('password')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm
                Password</label>
            <input id="password_confirmation" wire:model="password_confirmation" type="password" required
                autocomplete="new-password" placeholder="Confirm Password"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            @error('password_confirmation')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-700 text-white font-semibold rounded-md hover:from-purple-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-900 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                Register
            </button>
        </div>
    </form>

    <div class="text-center text-sm text-gray-400">
        Already have an account?
        <a href="{{ route('login') }}" wire:navigate
            class="font-semibold text-purple-400 hover:text-purple-300 transition-colors">Log in</a>
    </div>
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