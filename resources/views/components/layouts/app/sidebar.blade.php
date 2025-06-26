<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MotherLang - Kenyan Languages Visual Dictionary' }}</title>
    <meta name="description"
        content="MotherLang is a visual dictionary for Kenyan languages, designed to help you learn and explore the rich linguistic diversity of Kenya.">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#7c3aed">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    {{-- Vite Assets for Laravel --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js for interactive elements --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Google Font: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .gradient-logo {
            background: linear-gradient(90deg, #7c3aed 0%, #dc2626 100%);
        }

        .sidebar-bg {
            background-color: #1a202c;
            /* Equivalent to bg-zinc-900 or darker gray */
        }

        .main-content-bg {
            background-color: #0a0909;
            /* A very dark gray for main content */
        }

        .glass-effect-nav {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            /* Lighter transparency for nav */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .shadow-custom {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen flex">

    <!-- Desktop Sidebar -->
    <aside x-data="{ open: true }"
        class="hidden lg:flex flex-col w-64 fixed inset-y-0 left-0 sidebar-bg border-r border-gray-800 p-6 shadow-xl z-40 transition-all duration-300 ease-in-out">
        <a href="{{ route('dashboard') }}" class="mb-8 flex items-center space-x-3 rtl:space-x-reverse" wire:navigate>
            <div
                class="w-10 h-10 gradient-logo rounded-lg flex items-center justify-center font-bold text-lg text-white">
                M
            </div>
            <span class="text-2xl font-bold text-white">MotherLang</span>
        </a>

        <!-- Navigation List -->
        <nav class="flex flex-col flex-grow">
            <h3 class="text-sm font-semibold uppercase text-gray-500 mb-4">Platform</h3>
            <ul class="space-y-2 mb-8">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg text-base font-medium
                       {{ request()->routeIs('dashboard') ? 'bg-purple-700 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                       transition-all duration-200" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('languages.index') }}" class="flex items-center gap-3 p-3 rounded-lg text-base font-medium
                       {{ request()->routeIs('languages.*') ? 'bg-purple-700 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                       transition-all duration-200" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.5 3-9s-1.343-9-3-9m0 18v-2m0-16V5m0 10v1m0-11V9m-4 7a4 4 0 11-8 0 4 4 0 018 0zm0 0v1m0-2v1">
                            </path>
                        </svg>
                        <span>Languages</span>
                    </a>
                </li>
            </ul>

            <div class="flex-grow"></div> {{-- Spacer --}}

            <h3 class="text-sm font-semibold uppercase text-gray-500 mb-4">Resources</h3>
            <ul class="space-y-2">
                <li>
                    <a href="https://github.com/laravel/livewire-starter-kit" target="_blank"
                        class="flex items-center gap-3 p-3 rounded-lg text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                        </svg>
                        <span>Repository</span>
                    </a>
                </li>
                <li>
                    <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank"
                        class="flex items-center gap-3 p-3 rounded-lg text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.523 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.523 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span>Documentation</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Desktop User Menu Dropdown -->
        <div x-data="{ open: false }" class="relative mt-8">
            <button @click="open = !open" type="button"
                class="w-full flex items-center justify-between p-3 rounded-lg bg-gray-700 hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-purple-500">
                <span class="flex items-center gap-3">
                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-full">
                        <span
                            class="flex h-full w-full items-center justify-center rounded-full bg-purple-600 text-white font-bold text-sm">
                            {{ auth()->user()->initials() ?? 'ML' }}
                        </span>
                    </span>
                    <span class="grid flex-1 text-start text-sm leading-tight">
                        <span class="truncate font-semibold text-white">{{ auth()->user()->name ?? 'Guest User'
                            }}</span>
                        <span class="truncate text-xs text-gray-400">{{ auth()->user()->email ?? 'guest@example.com'
                            }}</span>
                    </span>
                </span>
                <svg class="w-4 h-4 text-gray-400 transform transition-transform duration-200"
                    :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute bottom-full left-0 mb-2 w-full bg-gray-800 rounded-lg shadow-lg border border-gray-700 py-1"
                style="display: none;">
                <a href="{{ route('settings.profile') }}"
                    class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors rounded-md"
                    wire:navigate>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.587.362 1.367.545 2.09.545zm1.536 7.683c-.828 0-1.5-.672-1.5-1.5s.672-1.5 1.5-1.5 1.5.672 1.5 1.5-.672 1.5-1.5 1.5z">
                        </path>
                    </svg>
                    <span>Settings</span>
                </a>
                <div class="border-t border-gray-700 my-1"></div>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors rounded-md text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H5a3 3 0 01-3-3V7a3 3 0 013-3h5a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex flex-col flex-1 lg:ml-64">
        <!-- Mobile Top Bar (mimics header from Flux) -->
        <header x-data="{ open: false }"
            class="lg:hidden sticky top-0 w-full glass-effect-nav border-b border-white/10 p-4 flex items-center justify-between z-30 shadow-custom">
            <button @click="open = !open" class="text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <span class="text-xl font-bold text-white">MotherLang</span>

            <!-- Mobile User Menu Dropdown -->
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = !dropdownOpen" type="button"
                    class="flex items-center gap-2 p-1 rounded-full bg-gray-700 hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-full">
                        <span
                            class="flex h-full w-full items-center justify-center rounded-full bg-purple-600 text-white font-bold text-sm">
                            {{ auth()->user()->initials() ?? 'ML' }}
                        </span>
                    </span>
                    <svg class="w-4 h-4 text-gray-400 transform transition-transform duration-200"
                        :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg border border-gray-700 py-1"
                    style="display: none;">
                    <div class="p-4 border-b border-gray-700 mb-2">
                        <p class="font-semibold text-white truncate">{{ auth()->user()->name ?? 'Guest User' }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email ?? 'guest@example.com' }}</p>
                    </div>
                    <a href="{{ route('settings.profile') }}"
                        class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors rounded-md"
                        @click="dropdownOpen = false" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.587.362 1.367.545 2.09.545zm1.536 7.683c-.828 0-1.5-.672-1.5-1.5s.672-1.5 1.5-1.5 1.5.672 1.5 1.5-.672 1.5-1.5 1.5z">
                            </path>
                        </svg>
                        <span>Settings</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors rounded-md text-left">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H5a3 3 0 01-3-3V7a3 3 0 013-3h5a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Mobile Sidebar Overlay (when open) -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 -translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-full"
                class="fixed inset-y-0 left-0 w-64 sidebar-bg border-r  border-gray-800 p-6 z-50 flex flex-col shadow-xl"
                @click.away="open = false" style="display: none;">
                <button @click="open = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <a href="{{ route('dashboard') }}" class="mb-8 flex items-center space-x-3 rtl:space-x-reverse"
                    wire:navigate @click="open = false">
                    <div
                        class="w-10 h-10 gradient-logo rounded-lg flex items-center justify-center font-bold text-lg text-white">
                        M
                    </div>
                    <span class="text-2xl font-bold text-white">MotherLang</span>
                </a>

                <nav class="flex flex-col flex-grow">
                    <h3 class="text-sm font-semibold uppercase text-gray-500 mb-4">Platform</h3>
                    <ul class="space-y-2 mb-8">
                        <li>
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg text-base font-medium
                               {{ request()->routeIs('dashboard') ? 'bg-purple-700 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                               transition-all duration-200" wire:navigate @click="open = false">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('languages.index') }}" class="flex items-center gap-3 p-3 rounded-lg text-base font-medium
                               {{ request()->routeIs('languages.*') ? 'bg-purple-700 text-white shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                               transition-all duration-200" wire:navigate @click="open = false">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.5 3-9s-1.343-9-3-9m0 18v-2m0-16V5m0 10v1m0-11V9m-4 7a4 4 0 11-8 0 4 4 0 018 0zm0 0v1m0-2v1">
                                    </path>
                                </svg>
                                <span>Languages</span>
                            </a>
                        </li>
                    </ul>

                    <div class="flex-grow"></div> {{-- Spacer --}}

                    <h3 class="text-sm font-semibold uppercase text-gray-500 mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="https://github.com/laravel/livewire-starter-kit" target="_blank"
                                class="flex items-center gap-3 p-3 rounded-lg text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200"
                                @click="open = false">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                                <span>Repository</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank"
                                class="flex items-center gap-3 p-3 rounded-lg text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-200"
                                @click="open = false">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.523 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.523 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                                <span>Documentation</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main content area -->
        <main class="flex-grow p-4 bg-gray-900">
            {{ $slot }}
        </main>
    </div>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="{{ url('/') }}#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href').split('#')[1];
                const target = document.getElementById(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // This particular scroll effect is for a standalone nav,
        // which might not be needed as much with a fixed sidebar/topbar.
        // Keeping it for potential adaptation or if user wants a different type of page.
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('header.lg\\:hidden'); // Targeting the mobile header
            if (nav && window.scrollY > 50) {
                nav.style.backgroundColor = 'rgba(17, 24, 39, 0.9)'; // gray-900 with transparency
                nav.classList.add('shadow-xl');
            } else if (nav) {
                nav.style.backgroundColor = 'rgba(255, 255, 255, 0.05)'; // glass effect
                nav.classList.remove('shadow-xl');
            }
        });
    </script>
</body>

</html>