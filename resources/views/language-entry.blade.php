<x-layouts.app.guest language="{{ $language->name }}">
    @push('styles')
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(0);
                opacity: 1;
            }

            100% {
                transform: scale(4);
                opacity: 0;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.6s ease-out;
        }

        .animate-pulse-gentle {
            animation: pulse 2s ease-in-out infinite;
        }

        .audio-visualizer {
            position: relative;
            overflow: hidden;
        }

        .audio-visualizer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            animation: none;
            transition: animation 0.3s ease;
        }

        .audio-visualizer.playing::before {
            animation: ripple 2s ease-in-out infinite;
        }

        .pronunciation-guide {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border: 1px solid #7dd3fc;
        }

        .dark .pronunciation-guide {
            background: linear-gradient(135deg, #0c4a6e, #075985);
            border: 1px solid #0369a1;
        }

        .example-highlight {
            position: relative;
            padding: 0.25rem 0.5rem;
            margin: 0 0.125rem;
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-radius: 0.375rem;
            color: #92400e;
            font-weight: 600;
        }

        .dark .example-highlight {
            background: linear-gradient(135deg, #451a03, #78350f);
            color: #fbbf24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass-card {
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .floating-action {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 50;
        }

        @media (max-width: 768px) {
            .floating-action {
                bottom: 1rem;
                right: 1rem;
            }
        }
    </style>
    @endpush

    <section id="language-entry"
        class="min-h-screen py-16 md:py-24 bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-950 dark:via-gray-900 dark:to-slate-900 relative overflow-hidden transition-colors duration-500">

        {{-- Enhanced background pattern --}}
        <div class="absolute inset-0 z-0 opacity-10"
            style="background-image: radial-gradient(circle, #D1D5DB 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        <div class="absolute inset-0 z-0 opacity-5 dark:opacity-10"
            style="background-image: radial-gradient(circle, #2d3748 1px, transparent 1px); background-size: 40px 40px; background-position: 10px 10px;">
        </div>

        <div class="max-w-5xl mx-auto px-4 lg:px-8 relative z-10">

            {{-- Breadcrumb Navigation --}}
            <nav class="mb-8 animate-fadeInUp">
                <div class="glass-card rounded-xl p-4 shadow-lg">
                    <ol class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                        <li>
                            <a href="{{ route('languages.index') }}"
                                class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z"></path>
                                </svg>
                                Languages
                            </a>
                        </li>
                        <li class="text-gray-400 dark:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </li>
                        <li>
                            <a href="{{ route('languages.entries', $language) }}"
                                class="hover:text-teal-600 dark:hover:text-teal-400 transition-colors flex items-center">
                                <span class="text-xl mr-1">{{ $language->icon ?? '🌍' }}</span>
                                {{ $language->name }}
                            </a>
                        </li>
                        <li class="text-gray-400 dark:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </li>
                        <li class="font-medium text-gray-900 dark:text-white">{{ $translatedWord->word }}</li>
                    </ol>
                </div>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Main Content --}}
                <div class="lg:col-span-2">

                    {{-- Word Card --}}
                    <div class="glass-card rounded-3xl p-8 shadow-2xl mb-8 animate-slideInLeft">

                        {{-- Image Section --}}
                        {{-- Image Section --}}
                        @php
                        $category = $mainEntry->category->slug ?? '';
                        $imageExists = $mainEntry->image_path && file_exists(public_path('storage/' .
                        $mainEntry->image_path));
                        @endphp

                        @if ($category === 'numbers' && $mainEntry->numeric_value !== null)
                        {{-- Show Numeric Value --}}
                        <div class="mb-8 h-64 md:h-80 flex items-center justify-center text-7xl font-bold rounded-2xl shadow-inner
                bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900">
                            {{ $mainEntry->numeric_value }}
                        </div>

                        @elseif ($category === 'colors' && !empty($mainEntry->color_code))
                        {{-- Show Color Block --}}
                        <div class="mb-8 h-64 md:h-80 rounded-2xl shadow-inner border dark:border-gray-700"
                            style="background-color: {{ $mainEntry->color_code }}">
                        </div>

                        @elseif ($imageExists)
                        {{-- Show Stored Image --}}
                        <div class="mb-8 relative group">
                            <div
                                class="overflow-hidden rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900 p-6 h-64 md:h-80 flex items-center justify-center shadow-inner">
                                <img src="{{ asset('storage/' . $mainEntry->image_path) }}"
                                    alt="{{ $mainEntry->word_en }}"
                                    class="max-w-full max-h-full object-contain transition-transform duration-500 ease-out group-hover:scale-110">
                            </div>
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/5 rounded-2xl transition-colors duration-300">
                            </div>
                        </div>

                        @elseif (!empty($mainEntry->icon))
                        {{-- Show Emoji Icon --}}
                        <div class="mb-8 h-64 md:h-80 flex items-center justify-center text-7xl rounded-2xl shadow-inner
                bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900">
                            {!! $mainEntry->icon !!}
                        </div>

                        @else
                        {{-- Fallback: No Visual --}}
                        <div class="mb-8 relative group">
                            <div
                                class="h-64 md:h-80 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-2xl flex items-center justify-center shadow-inner">
                                <div class="text-center">
                                    <svg class="w-24 h-24 mx-auto text-gray-300 dark:text-gray-600 mb-4 group-hover:scale-110 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400 text-lg">Visual coming soon</p>
                                </div>
                            </div>
                        </div>
                        @endif


                        {{-- Word Display --}}
                        <div class="text-center mb-8">
                            <h1
                                class="text-5xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent dark:from-white dark:via-gray-100 dark:to-white leading-tight">
                                {{ $translatedWord->word }}
                            </h1>

                            {{-- Pronunciation Guide --}}
                            @if($translatedWord->pronunciation)
                            <div class="pronunciation-guide rounded-full px-6 py-3 inline-block mb-4">
                                <span class="text-lg font-mono text-blue-800 dark:text-blue-200">
                                    /{{ $translatedWord->pronunciation }}/
                                </span>
                            </div>
                            @endif

                            <p class="text-2xl md:text-3xl text-gray-600 dark:text-gray-300 font-medium">
                                {{ $mainEntry->word_en }}
                            </p>

                            {{-- Category Badge --}}
                            @if($translatedWord->category)
                            <div class="mt-4">
                                <span
                                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-full shadow-lg text-sm font-semibold">
                                    <span class="mr-2">{{ $translatedWord->category->icon ?? '📁' }}</span>
                                    {{ $translatedWord->category->name }}
                                </span>
                            </div>
                            @endif
                        </div>

                        {{-- Audio Section --}}
                        <div class="mb-8">
                            @if($translatedWord->audio_path)
                            <div
                                class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl p-6 border border-blue-200/50 dark:border-blue-800/50">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white flex items-center">
                                        <svg class="w-6 h-6 mr-2 text-blue-600 dark:text-blue-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 14.142M6.343 6.343A8 8 0 106.343 17.657">
                                            </path>
                                        </svg>
                                        Pronunciation
                                    </h3>
                                    <button id="playButton"
                                        class="flex items-center justify-center w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-500/30">
                                        <svg id="playIcon" class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div
                                    class="audio-visualizer rounded-xl overflow-hidden bg-white/50 dark:bg-gray-800/50">
                                    <audio id="audioPlayer" class="w-full h-12" controls>
                                        <source src="{{ asset('storage/' . $translatedWord->audio_path) }}"
                                            type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </div>
                            @else
                            <div
                                class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20 rounded-2xl p-6 border border-amber-200/50 dark:border-amber-800/50 text-center">
                                <div class="animate-pulse-gentle mb-4">
                                    <svg class="w-16 h-16 mx-auto text-amber-400 dark:text-amber-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 14.142M6.343 6.343A8 8 0 106.343 17.657">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-amber-800 dark:text-amber-200 mb-2">Audio Coming
                                    Soon!</h3>
                                <p class="text-amber-600 dark:text-amber-300">We're working on adding pronunciation
                                    audio for this word.</p>
                            </div>
                            @endif
                        </div>

                        {{-- Example Sentence --}}
                        @if($translatedWord->example_sentence)
                        <div
                            class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-2xl p-6 border border-emerald-200/50 dark:border-emerald-800/50">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-emerald-600 dark:text-emerald-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                Example Usage
                            </h3>
                            <blockquote class="text-lg italic text-gray-700 dark:text-gray-300 leading-relaxed">
                                "{{ str_replace($translatedWord->word, '<span class="example-highlight">' .
                                    $translatedWord->word . '</span>', $translatedWord->example_sentence) }}"
                            </blockquote>
                            @if($translatedWord->example_translation)
                            <p
                                class="mt-3 text-sm text-gray-600 dark:text-gray-400 border-t border-emerald-200/50 dark:border-emerald-800/50 pt-3">
                                <span class="font-semibold">Translation:</span> {{ $translatedWord->example_translation
                                }}
                            </p>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-8 space-y-6 animate-slideInRight">

                        {{-- Quick Actions --}}
                        <div class="glass-card rounded-2xl p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-teal-600 dark:text-teal-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Quick Actions
                            </h3>
                            <div class="space-y-3">
                                <button id="favoriteBtn"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white rounded-xl shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-pink-500/30">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                    Add to Favorites
                                </button>

                                <button id="shareBtn"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white rounded-xl shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-500/30">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                        </path>
                                    </svg>
                                    Share Word
                                </button>

                                <a href="{{ route('languages.random_entry', $language->slug) }}" id="randomWordBtn"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-purple-500 to-violet-500 hover:from-purple-600 hover:to-violet-600 text-white rounded-xl shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-500/30">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004 16.08V12m4.214-1.214L11.99 15.01">
                                        </path>
                                    </svg>
                                    Random Word
                                </a>
                            </div>
                        </div>

                        {{-- Word Stats --}}
                        <div class="glass-card rounded-2xl p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-teal-600 dark:text-teal-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                Word Information
                            </h3>
                            <div class="space-y-3">
                                <div
                                    class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-gray-700/50">
                                    <span class="text-gray-600 dark:text-gray-400">Language:</span>
                                    <span class="font-semibold text-gray-800 dark:text-white flex items-center">
                                        <span class="mr-1">{{ $language->icon ?? '🌍' }}</span>
                                        {{ $language->name }}
                                    </span>
                                </div>
                                @if($mainEntry->category->name)
                                <div
                                    class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-gray-700/50">
                                    <span class="text-gray-600 dark:text-gray-400">Category:</span>
                                    <span class="font-semibold text-gray-800 dark:text-white">{{
                                        $mainEntry->category->name }}</span>
                                </div>
                                @endif
                                <div
                                    class="flex justify-between items-center py-2 border-b border-gray-200/50 dark:border-gray-700/50">
                                    <span class="text-gray-600 dark:text-gray-400">Length:</span>
                                    <span class="font-semibold text-gray-800 dark:text-white">{{
                                        strlen($translatedWord->word) }} characters</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-600 dark:text-gray-400">Added:</span>
                                    <span class="font-semibold text-gray-800 dark:text-white">{{
                                        $translatedWord->created_at->format('M j, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Navigation --}}
                        <div class="glass-card rounded-2xl p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-teal-600 dark:text-teal-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                    </path>
                                </svg>
                                Navigation
                            </h3>
                            <div class="space-y-3">
                                <a href="{{ route('languages.entries', $language) }}"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 text-white rounded-xl shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-teal-500/30">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Back to {{ $language->name }}
                                </a>

                                <a href="{{ route('languages.index') }}"
                                    class="w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white rounded-xl shadow-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-500/30">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2z">
                                        </path>
                                    </svg>
                                    All Languages
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Floating Action Button --}}
        <div class="floating-action">
            <button id="scrollToTopBtn"
                class="w-14 h-14 bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 text-white rounded-full shadow-2xl transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-teal-500/30 opacity-0 pointer-events-none">
                <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                    </path>
                </svg>
            </button>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Audio Player Functionality ---
            const audioPlayer = document.getElementById('audioPlayer');
            const playButton = document.getElementById('playButton');
            const playIcon = document.getElementById('playIcon');
            const audioVisualizer = document.querySelector('.audio-visualizer');

            if (audioPlayer && playButton) {
                // Ensure the default controls are hidden if we're using a custom button
                audioPlayer.removeAttribute('controls'); 

                playButton.addEventListener('click', function () {
                    if (audioPlayer.paused) {
                        audioPlayer.play();
                    } else {
                        audioPlayer.pause();
                    }
                });

                audioPlayer.addEventListener('play', function () {
                    playIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    `; // Pause icon
                    audioVisualizer.classList.add('playing');
                });

                audioPlayer.addEventListener('pause', function () {
                    playIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1"></path>
                    `; // Play icon
                    audioVisualizer.classList.remove('playing');
                });

                audioPlayer.addEventListener('ended', function() {
                    audioVisualizer.classList.remove('playing');
                    playIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1"></path>
                    `; // Play icon
                });
            }

            // --- Scroll to Top Button Functionality ---
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            if (scrollToTopBtn) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 300) { // Show button after scrolling 300px
                        scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                        scrollToTopBtn.classList.add('opacity-100');
                    } else {
                        scrollToTopBtn.classList.remove('opacity-100');
                        scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
                    }
                });

                scrollToTopBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth' // Smooth scroll animation
                    });
                });
            }

            // --- Quick Actions: Share Button ---
            const shareBtn = document.getElementById('shareBtn');
            if (shareBtn) {
                shareBtn.addEventListener('click', async function() {
                    const word = "{{ $translatedWord->word }}";
                    const englishMeaning = "{{ $mainEntry->word_en }}";
                    const pageUrl = window.location.href;

                    try {
                        if (navigator.share) {
                            await navigator.share({
                                title: `Learn "${word}" (${englishMeaning})`,
                                text: `Check out "${word}" (${englishMeaning}) in {{ $language->name }}!`,
                                url: pageUrl,
                            });
                            console.log('Content shared successfully');
                        } else {
                            // Fallback for browsers that do not support Web Share API
                            const shareText = `Learn "${word}" (${englishMeaning}) in {{ $language->name }}: ${pageUrl}`;
                            navigator.clipboard.writeText(shareText).then(() => {
                                alert('Link copied to clipboard!');
                            }).catch(err => {
                                console.error('Failed to copy text: ', err);
                                alert('Could not copy link. Please copy it manually from your browser\'s address bar.');
                            });
                        }
                    } catch (error) {
                        console.error('Error sharing:', error);
                    }
                });
            }

            // --- Quick Actions: Favorite Button (Placeholder) ---
            const favoriteBtn = document.getElementById('favoriteBtn');
            if (favoriteBtn) {
                favoriteBtn.addEventListener('click', function() {
                    // In a real application, you would send an AJAX request here
                    // to add/remove the word from the user's favorites.
                    // For demonstration, we'll just show an alert.
                    alert('This word has been added to your favorites! (Functionality to be implemented)');
                    // You might also change the icon or style of the button
                    // to indicate it's favorited.
                });
            }

            // --- Quick Actions: Random Word Button ---
            const randomWordBtn = document.getElementById('randomWordBtn');
            if (randomWordBtn) {
                randomWordBtn.addEventListener('click', function() {
                    // This assumes you have a backend route to fetch a random word for this language
                    const languageId = "{{ $language->id }}";
                    window.location.href = `/languages/${languageId}/entries/random`; // Example route
                    // Make sure your Laravel backend has a route like:
                    // Route::get('/languages/{language}/entries/random', [LanguageEntryController::class, 'randomEntry'])->name('languages.entries.random');
                });
            }
        });
    </script>
    @endpush
</x-layouts.app.guest>