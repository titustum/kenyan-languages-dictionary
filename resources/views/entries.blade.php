<x-layouts.app.guest language="{{ $language->name }}">

    {{-- Custom Tailwind Animations and other styles --}}
    @push('styles')
    <style>
        /* Custom styling for audio player track and thumb for consistency */
        /* Light Theme defaults */
        audio::-webkit-media-controls-panel {
            background-color: #E5E7EB;
            color: #4B5563;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        audio::-webkit-media-controls-play-button,
        audio::-webkit-media-controls-current-time-display,
        audio::-webkit-media-controls-time-remaining-display,
        audio::-webkit-media-controls-timeline,
        audio::-webkit-media-controls-volume-slider {
            color: #4B5563;
        }

        audio::-webkit-media-controls-timeline {
            background-color: #D1D5DB;
            border-radius: 10px;
        }

        audio::-webkit-media-controls-volume-slider {
            background-color: #D1D5DB;
            border-radius: 10px;
        }

        /* Dark Theme overrides for audio controls */
        .dark audio::-webkit-media-controls-panel {
            background-color: #1F2937;
            color: #9CA3AF;
        }

        .dark audio::-webkit-media-controls-play-button,
        .dark audio::-webkit-media-controls-current-time-display,
        .dark audio::-webkit-media-controls-time-remaining-display,
        .dark audio::-webkit-media-controls-timeline,
        .dark audio::-webkit-media-controls-volume-slider {
            color: #D1D5DB;
        }

        .dark audio::-webkit-media-controls-timeline,
        .dark audio::-webkit-media-controls-volume-slider {
            background-color: #374151;
        }

        /* Firefox specific styles for audio controls */
        audio {
            --moz-range-thumb: #20B2AA;
            --moz-range-track: #D1D5DB;
        }

        .dark audio {
            --moz-range-thumb: #20B2AA;
            --moz-range-track: #374151;
        }

        /* Enhanced Animations */
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeInScale {
            animation: fadeInScale 0.5s ease-out forwards;
            opacity: 0;
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-20px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.6s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.7s ease-out forwards;
            opacity: 0;
        }

        /* New: Stagger animation for entry cards */
        @keyframes staggerFadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-stagger {
            animation: staggerFadeIn 0.4s ease-out forwards;
            opacity: 0;
        }

        /* Enhanced hover effects */
        .entry-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .entry-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .dark .entry-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* Improved search input focus state */
        #searchInput:focus {
            transform: scale(1.01);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }

        /* Loading state */
        .loading-pulse {
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Sidebar animations */
        .sidebar-enter-active,
        .sidebar-leave-active {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease-out;
        }

        .sidebar-enter-from,
        .sidebar-leave-to {
            transform: translateX(-100%);
            opacity: 0;
        }

        .sidebar-enter-to,
        .sidebar-leave-from {
            transform: translateX(0);
            opacity: 1;
        }

        /* Overlay animations */
        .overlay-enter-active,
        .overlay-leave-active {
            transition: opacity 0.3s ease-out;
        }

        .overlay-enter-from,
        .overlay-leave-to {
            opacity: 0;
        }

        .overlay-enter-to,
        .overlay-leave-from {
            opacity: 1;
        }

        /* Improved scrollbar for sidebar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #D1D5DB;
            border-radius: 3px;
        }

        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #4B5563;
        }
    </style>
    @endpush

    <section
        class="min-h-screen py-16 md:py-24 bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 relative overflow-hidden dark:from-gray-950 dark:to-gray-900 dark:text-white">
        {{-- Enhanced background pattern --}}
        <div class="absolute inset-0 z-0 opacity-10"
            style="background-image: radial-gradient(circle, #D1D5DB 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        <div class="absolute inset-0 z-0 opacity-5 dark:opacity-10"
            style="background-image: radial-gradient(circle, #2d3748 1px, transparent 1px); background-size: 40px 40px; background-position: 10px 10px;">
        </div>

        <div class="max-w-7xl mx-auto px-4 lg:px-8 relative z-10">

            {{-- Enhanced Header --}}
            <div class="text-center mb-8 md:mb-16 animate-fadeInUp">
                <div
                    class="text-7xl mb-4 transform hover:scale-110 transition-transform duration-300 cursor-default select-none">
                    {{ $language->icon ?? '🌍' }}
                </div>
                <h1
                    class="text-4xl md:text-6xl font-extrabold leading-tight bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent drop-shadow-lg dark:from-white dark:to-gray-300">
                    Explore {{ $language->name }} Vocabulary
                </h1>
                <p class="text-gray-600 mt-4 text-lg md:text-xl max-w-3xl mx-auto dark:text-gray-300 leading-relaxed">
                    {{ $language->description ?? 'Discover a rich collection of words, phrases, and examples from this
                    vibrant language.' }}
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">
                    <a href="{{ route('languages.show', $language) }}"
                        class="inline-flex items-center text-teal-600 hover:text-teal-700 hover:underline font-medium transition duration-200 group dark:text-teal-400 dark:hover:text-teal-300">
                        <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Learn more about {{ $language->name }}
                    </a>

                    {{-- New: Stats display --}}
                    <div class="flex items-center gap-6 text-sm text-gray-500 dark:text-gray-400">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            {{ $entries->total() ?? $entries->count() }} words
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            {{ $categories->count() }} categories
                        </span>
                    </div>
                </div>
            </div>

            {{-- Enhanced Filter Button for Mobile --}}
            <div class="lg:hidden text-center mb-8">
                <button id="toggleSidebarBtn"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 active:from-teal-800 active:to-teal-900 text-white font-semibold rounded-full shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-teal-500/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                    Filter Categories
                    <span id="activeFilterBadge" class="ml-2 px-2 py-1 bg-white/20 rounded-full text-xs hidden">1</span>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 md:gap-10">
                {{-- Enhanced Sidebar --}}
                <aside id="sidebar" class="lg:col-span-1 bg-white/80 backdrop-blur-sm p-6 shadow-2xl lg:rounded-2xl border border-gray-200/50 animate-slideInLeft overflow-y-auto custom-scrollbar hidden lg:block fixed inset-y-0 left-0 w-72 z-40 lg:static lg:w-auto lg:h-fit lg:sticky lg:top-8
                    dark:bg-gray-800/80 dark:border-gray-700/50">
                    <div
                        class="flex justify-between items-center mb-6 border-b border-gray-200 pb-4 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                            <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Categories
                        </h2>
                        <button id="closeSidebarBtn"
                            class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('languages.entries', $language->slug) }}"
                                class="block p-3 rounded-xl text-base transition-all duration-200 ease-in-out group
                                        {{ request()->get('category') ? 'text-gray-700 hover:bg-gray-100 hover:shadow-sm dark:text-gray-300 dark:hover:bg-gray-700' : 'bg-gradient-to-r from-teal-600 to-teal-700 text-white font-bold shadow-lg hover:shadow-xl hover:from-teal-700 hover:to-teal-800' }}">
                                <span class="flex flex-nowrap items-center gap-3">
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    All Entries
                                    {{-- <span class="ml-auto text-sm opacity-75">({{ $entries->total() ??
                                        $entries->count()
                                        }})</span> --}}
                                </span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('languages.entries', [$language->slug, 'category' => $category->slug]) }}"
                                class="flex flex-nowrap items-center text-base gap-3 p-3 rounded-xl transition-all duration-200 ease-in-out group
                                        {{ request()->get('category') === $category->slug ? 'bg-gradient-to-r from-teal-600 to-teal-700 text-white font-bold shadow-lg hover:shadow-xl hover:from-teal-700 hover:to-teal-800' : 'text-gray-700 hover:bg-gray-100 hover:shadow-sm dark:text-gray-300 dark:hover:bg-gray-700' }}">
                                <span class="text-xl group-hover:scale-110 transition-transform">{{ $category->icon ??
                                    '📁' }}</span>
                                <span class="flex-1">{{ $category->name }}</span>
                                {{-- <span class="text-sm opacity-75">({{ $category->entries_count ?? 0 }})</span> --}}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    {{-- New: Quick actions --}}
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3 dark:text-gray-400">
                            Quick Actions</h3>
                        <div class="space-y-2">
                            <button onclick="document.getElementById('searchInput').focus()"
                                class="w-full text-left p-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition-colors dark:text-gray-400 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Quick Search
                            </button>
                            <button id="randomEntryBtn"
                                class="w-full text-left p-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition-colors dark:text-gray-400 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004 16.08V12m4.214-1.214L11.99 15.01">
                                    </path>
                                </svg>
                                Random Word
                            </button>
                        </div>
                    </div>
                </aside>

                {{-- Enhanced Overlay --}}
                <div id="sidebarOverlay"
                    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-30 hidden lg:hidden transition-all duration-300">
                </div>

                {{-- Enhanced Main Content --}}
                <main class="lg:col-span-4 space-y-8">

                    {{-- Enhanced Search Input --}}
                    <div class="mb-6 animate-fadeInUp delay-100">
                        <div class="relative group">
                            <input type="text" id="searchInput" value="{{ request()->get('search') }}"
                                placeholder="Search words, translations, or examples..." class="w-full bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl pl-14 pr-12 py-4 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500/50 focus:border-teal-500 transition-all duration-300 text-lg shadow-lg hover:shadow-xl
                                dark:bg-gray-800/80 dark:border-gray-700/50 dark:text-white dark:placeholder-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-6 w-6 text-gray-400 group-focus-within:text-teal-500 transition-colors duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <button id="clearSearchBtn"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200 hidden">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        {{-- Search suggestions/filters --}}
                        <div id="searchSuggestions" class="mt-2 hidden">
                            <div class="flex flex-wrap gap-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Try:</span>
                                <button
                                    class="suggestion-tag px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full text-sm text-gray-600 transition-colors dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300"
                                    data-search="family">family</button>
                                <button
                                    class="suggestion-tag px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full text-sm text-gray-600 transition-colors dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300"
                                    data-search="food">food</button>
                                <button
                                    class="suggestion-tag px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full text-sm text-gray-600 transition-colors dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300"
                                    data-search="greetings">greetings</button>
                            </div>
                        </div>
                    </div>

                    {{-- Results counter --}}
                    <div id="resultsCounter" class="text-sm text-gray-500 dark:text-gray-400 hidden">
                        Showing <span id="visibleCount">0</span> of <span id="totalCount">{{ $entries->count() }}</span>
                        entries
                    </div>

                    {{-- Enhanced Entries Grid --}}
                    @if($entries->count())
                    <div id="entriesGrid"
                        class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 animate-fadeInScale">
                        @foreach ($entries as $index => $entry)
                        <div class="entry-card p-4 transition-all duration-300 transform bg-white/80 backdrop-blur-sm rounded-2xl shadow-md hover:shadow-2xl border border-gray-200/50 animate-stagger
                            dark:bg-gray-800/80 dark:border-gray-700/50" data-word="{{ strtolower($entry->word) }}"
                            data-translation="{{ strtolower($entry->mainEntry->word_en) }}"
                            data-example="{{ strtolower($entry->example ?? '') }}"
                            style="animation-delay: {{ $index * 0.05 }}s">

                            {{-- Enhanced Image Display --}}
                            @if($entry->mainEntry->image_path)
                            <a href="{{ route('languages.entry', [$language, $entry->slug]) }}"
                                class="block relative group mb-3">
                                <div
                                    class="w-20 h-20 mx-auto rounded-2xl bg-gradient-to-br from-orange-100 to-orange-200 dark:from-gray-600 dark:to-gray-700 p-2 group-hover:scale-105 transition-transform duration-300">
                                    <img src="{{ asset('storage/' . $entry->mainEntry->image_path) }}"
                                        alt="{{ $entry->word }}" class="w-full h-full object-contain rounded-xl">
                                </div>
                            </a>
                            @else
                            <a href="{{ route('languages.entry', [$language, $entry->slug]) }}"
                                class="block relative group mb-3">
                                <div
                                    class="w-20 h-20 mx-auto rounded-2xl bg-gradient-to-br from-orange-300 to-orange-500 dark:from-gray-700 dark:to-gray-800 p-4 text-white group-hover:scale-105 transition-transform duration-300">
                                    <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                            @endif

                            {{-- Enhanced Word Display --}}
                            <div class="text-center space-y-2">
                                <a href="{{ route('languages.entry', [$language, $entry->slug]) }}"
                                    class="block hover:text-teal-600 dark:hover:text-teal-400 transition-colors duration-200">
                                    <h3
                                        class="font-bold text-gray-800 text-lg leading-tight entry-word dark:text-white mb-1">
                                        {{ $entry->word }}
                                    </h3>
                                    <p class="text-sm text-gray-600 entry-translation dark:text-gray-300">
                                        {{ $entry->mainEntry->word_en }}
                                    </p>
                                </a>

                                {{-- New: Category badge --}}
                                @if($entry->category)
                                <span
                                    class="inline-block px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs text-gray-600 dark:text-gray-300 rounded-full">
                                    {{ $entry->category->name }}
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Enhanced Pagination --}}
                    @if ($entries->hasPages())
                    <div id="paginationLinks" class="mt-12 animate-fadeInUp delay-200">
                        <div
                            class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 dark:bg-gray-800/80 dark:border-gray-700/50">
                            {{ $entries->links('pagination::tailwind') }}
                        </div>
                    </div>
                    @endif

                    @else
                    {{-- Enhanced Empty State --}}
                    <div id="noEntriesFoundInitial" class="text-center py-20 bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-gray-200/50 animate-fadeInUp
                        dark:bg-gray-800/80 dark:border-gray-700/50">
                        <div class="text-8xl mb-6 animate-bounce">📭</div>
                        <h3 class="text-4xl font-bold mb-4 text-gray-800 dark:text-white">No Entries Found Yet!</h3>
                        <p class="text-gray-600 text-xl max-w-md mx-auto mb-8 dark:text-gray-400">
                            It seems there are no words matching your search or category. Try broadening your search or
                            selecting "All Entries" to see everything.
                        </p>
                        <a href="{{ route('languages.entries', $language->slug) }}"
                            class="mt-8 inline-flex items-center bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white font-semibold py-3 px-7 rounded-full transition duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-teal-500/50">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004 16.08V12m4.214-1.214L11.99 15.01"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 20v-5h-.582m-15.356-2A8.001 8.001 0 0120 7.92V12m-4.214 1.214L12.01 8.99">
                                </path>
                            </svg>
                            Reset Filters
                        </a>
                    </div>
                    @endif

                    {{-- Empty State for JS filtering --}}
                    <div id="noResultsFoundJS" class="text-center py-20 lg:col-span-4 bg-white rounded-2xl shadow-xl border border-gray-200 hidden
                        dark:bg-gray-800 dark:border-gray-700">
                        <div class="text-7xl mb-6">🔍</div>
                        <h3 class="text-3xl font-bold mb-3 text-gray-800 dark:text-white">No Matches Found!</h3>
                        <p class="text-gray-600 text-lg max-w-md mx-auto dark:text-gray-400">
                            Your search yielded no results in this category. Try a different search term or select "All
                            Entries."
                        </p>
                        <button onclick="document.getElementById('searchInput').value = ''; filterEntries();"
                            class="mt-8 inline-block bg-teal-600 hover:bg-teal-700 active:bg-teal-800 text-white font-semibold py-3 px-7 rounded-full transition duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-teal-500/50">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004 16.08V12m4.214-1.214L11.99 15.01"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 20v-5h-.582m-15.356-2A8.001 8.001 0 0120 7.92V12m-4.214 1.214L12.01 8.99">
                                </path>
                            </svg>
                            Clear Search
                        </button>
                    </div>

                </main>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        // Enhanced JavaScript functionality for the vocabulary explorer
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearSearchBtn = document.getElementById('clearSearchBtn');
            const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const entriesGrid = document.getElementById('entriesGrid');
            const noResultsFoundJS = document.getElementById('noResultsFoundJS');
            const resultsCounter = document.getElementById('resultsCounter');
            const randomEntryBtn = document.getElementById('randomEntryBtn');
            const paginationLinks = document.getElementById('paginationLinks');
            const suggestionTags = document.querySelectorAll('.suggestion-tag');
            const activeFilterBadge = document.getElementById('activeFilterBadge');

            let originalEntries = [];
            let debounceTimer;

            // Initialize
            init();

            function init() {
                // Store original entries for filtering
                if (entriesGrid) {
                    originalEntries = Array.from(entriesGrid.querySelectorAll('.entry-card'));
                }

                // Set up event listeners
                setupEventListeners();
                
                // Initialize search state
                updateSearchState();
                
                // Add stagger animation to entries
                addStaggerAnimation();
                
                // Initialize filter badge
                updateActiveFilterBadge();
            }

            function setupEventListeners() {
                // Search functionality
                if (searchInput) {
                    searchInput.addEventListener('input', debounceSearch);
                    searchInput.addEventListener('focus', showSearchSuggestions);
                    searchInput.addEventListener('blur', hideSearchSuggestions);
                }

                if (clearSearchBtn) {
                    clearSearchBtn.addEventListener('click', clearSearch);
                }

                // Sidebar toggle
                if (toggleSidebarBtn) {
                    toggleSidebarBtn.addEventListener('click', toggleSidebar);
                }

                if (closeSidebarBtn) {
                    closeSidebarBtn.addEventListener('click', closeSidebar);
                }

                if (sidebarOverlay) {
                    sidebarOverlay.addEventListener('click', closeSidebar);
                }

                // Random entry button
                if (randomEntryBtn) {
                    randomEntryBtn.addEventListener('click', goToRandomEntry);
                }

                // Suggestion tags
                suggestionTags.forEach(tag => {
                    tag.addEventListener('click', function() {
                        const searchTerm = this.getAttribute('data-search');
                        if (searchInput) {
                            searchInput.value = searchTerm;
                            filterEntries();
                            searchInput.focus();
                        }
                    });
                });

                // Keyboard shortcuts
                document.addEventListener('keydown', handleKeyboardShortcuts);

                // Intersection Observer for animations
                setupIntersectionObserver();
            }

            function debounceSearch() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    filterEntries();
                    updateSearchState();
                }, 300);
            }

            function filterEntries() {
                if (!entriesGrid || originalEntries.length === 0) return;

                const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
                let visibleCount = 0;

                originalEntries.forEach(entry => {
                    const word = entry.getAttribute('data-word') || '';
                    const translation = entry.getAttribute('data-translation') || '';
                    const example = entry.getAttribute('data-example') || '';

                    const isMatch = !searchTerm || 
                        word.includes(searchTerm) || 
                        translation.includes(searchTerm) || 
                        example.includes(searchTerm);

                    if (isMatch) {
                        entry.style.display = 'block';
                        entry.style.animation = `fadeInScale 0.3s ease-out ${visibleCount * 0.05}s both`;
                        visibleCount++;
                    } else {
                        entry.style.display = 'none';
                    }
                });

                // Update results counter
                updateResultsCounter(visibleCount);

                // Show/hide no results message
                toggleNoResultsMessage(visibleCount === 0 && searchTerm);

                // Hide pagination when filtering
                if (paginationLinks) {
                    paginationLinks.style.display = searchTerm ? 'none' : 'block';
                }
            }

            function updateResultsCounter(visibleCount) {
                if (resultsCounter) {
                    const visibleSpan = document.getElementById('visibleCount');
                    const totalSpan = document.getElementById('totalCount');
                    
                    if (visibleSpan) visibleSpan.textContent = visibleCount;
                    if (totalSpan) totalSpan.textContent = originalEntries.length;
                    
                    resultsCounter.style.display = searchInput?.value.trim() ? 'block' : 'none';
                }
            }

            function toggleNoResultsMessage(show) {
                if (noResultsFoundJS) {
                    noResultsFoundJS.style.display = show ? 'block' : 'none';
                }
            }

            function updateSearchState() {
                const hasValue = searchInput && searchInput.value.trim().length > 0;
                
                if (clearSearchBtn) {
                    clearSearchBtn.style.display = hasValue ? 'flex' : 'none';
                }
            }

            function clearSearch() {
                if (searchInput) {
                    searchInput.value = '';
                    searchInput.focus();
                    filterEntries();
                    updateSearchState();
                }
            }

            function showSearchSuggestions() {
                const suggestions = document.getElementById('searchSuggestions');
                if (suggestions && !searchInput?.value.trim()) {
                    suggestions.classList.remove('hidden');
                }
            }

            function hideSearchSuggestions() {
                setTimeout(() => {
                    const suggestions = document.getElementById('searchSuggestions');
                    if (suggestions) {
                        suggestions.classList.add('hidden');
                    }
                }, 200);
            }

            function toggleSidebar() {
                if (sidebar && sidebarOverlay) {
                    sidebar.classList.remove('hidden');
                    sidebarOverlay.classList.remove('hidden');
                    
                    // Animate in
                    requestAnimationFrame(() => {
                        sidebar.style.transform = 'translateX(0)';
                        sidebarOverlay.style.opacity = '1';
                    });
                }
            }

            function closeSidebar() {
                if (sidebar && sidebarOverlay) {
                    sidebar.style.transform = 'translateX(-100%)';
                    sidebarOverlay.style.opacity = '0';
                    
                    setTimeout(() => {
                        sidebar.classList.add('hidden');
                        sidebarOverlay.classList.add('hidden');
                    }, 300);
                }
            }

            function goToRandomEntry() {
                const visibleEntries = originalEntries.filter(entry => 
                    entry.style.display !== 'none'
                );
                
                if (visibleEntries.length > 0) {
                    const randomEntry = visibleEntries[Math.floor(Math.random() * visibleEntries.length)];
                    const link = randomEntry.querySelector('a[href*="entry"]');
                    
                    if (link) {
                        // Add pulse animation
                        randomEntry.style.animation = 'pulse 0.5s ease-in-out';
                        
                        setTimeout(() => {
                            window.location.href = link.href;
                        }, 500);
                    }
                }
            }

            function handleKeyboardShortcuts(e) {
                // Ctrl/Cmd + K for search focus
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    if (searchInput) {
                        searchInput.focus();
                        searchInput.select();
                    }
                }
                
                // Escape to close sidebar
                if (e.key === 'Escape') {
                    closeSidebar();
                }
                
                // Escape to clear search
                if (e.key === 'Escape' && searchInput === document.activeElement) {
                    clearSearch();
                }
            }

            function addStaggerAnimation() {
                originalEntries.forEach((entry, index) => {
                    entry.style.animationDelay = `${index * 0.05}s`;
                });
            }

            function updateActiveFilterBadge() {
                const urlParams = new URLSearchParams(window.location.search);
                const hasActiveFilter = urlParams.has('category') || urlParams.has('search');
                
                if (activeFilterBadge) {
                    if (hasActiveFilter) {
                        activeFilterBadge.classList.remove('hidden');
                        activeFilterBadge.textContent = '1';
                    } else {
                        activeFilterBadge.classList.add('hidden');
                    }
                }
            }

            function setupIntersectionObserver() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-fadeInUp');
                        }
                    });
                }, { threshold: 0.1 });

                // Observe entry cards
                originalEntries.forEach(entry => {
                    observer.observe(entry);
                });
            }

            // Smooth scroll for internal links
            function setupSmoothScroll() {
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            }

            // Initialize smooth scroll
            setupSmoothScroll();
        }); 
    </script>
    @endpush
</x-layouts.app.guest>