<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="flex flex-col gap-8 p-6 sm:p-8 bg-gray-800 rounded-lg shadow-xl max-w-md mx-auto my-12 animate-fade-in">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-white mb-2">Forgot password</h2>
        <p class="text-gray-400 text-lg">Enter your email to receive a password reset link</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
    <div class="bg-green-500/20 text-green-300 p-3 rounded-md text-center text-sm">
        {{ session('status') }}
    </div>
    @endif

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
            <input id="email" wire:model="email" type="email" required autofocus placeholder="email@example.com"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-700 text-white font-semibold rounded-md hover:from-purple-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-900 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
            Email password reset link
        </button>
    </form>

    <div class="text-center text-sm text-gray-400">
        Or, return to
        <a href="{{ route('login') }}" wire:navigate
            class="font-semibold text-purple-400 hover:text-purple-300 transition-colors">log in</a>
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