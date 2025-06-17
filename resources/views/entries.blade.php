<x-layouts.app.guest language="{{ $language->name }}">
    {{-- Custom Tailwind CSS --}}

    {{-- Custom Tailwind Animations and other styles --}}
    @push('styles')
    <style>
        /* Custom styling for audio player track and thumb for consistency */
        audio::-webkit-media-controls-panel {
            background-color: #374151;
            /* gray-700 */
            color: #D1D5DB;
            /* gray-300 */
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        audio::-webkit-media-controls-play-button,
        audio::-webkit-media-controls-current-time-display,
        audio::-webkit-media-controls-time-remaining-display,
        audio::-webkit-media-controls-timeline,
        audio::-webkit-media-controls-volume-slider {
            color: #D1D5DB;
            /* gray-300 */
        }

        audio::-webkit-media-controls-timeline {
            background-color: #4B5563;
            /* gray-600 */
            border-radius: 10px;
        }

        audio::-webkit-media-controls-volume-slider {
            background-color: #4B5563;
            /* gray-600 */
            border-radius: 10px;
        }

        /* Firefox specific styles for audio controls */
        audio {
            --moz-range-thumb: #A78BFA;
            /* purple-400 */
            --moz-range-track: #4B5563;
            /* gray-600 */
        }

        /* Animations */
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
            /* hidden by default */
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

        /* Sidebar specific animation */
        .sidebar-enter-active,
        .sidebar-leave-active {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
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

        /* Overlay */
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
    </style>
    @endpush

    <section class="min-h-screen py-16 md:py-24 bg-gray-950 text-white relative overflow-hidden">
        {{-- Subtle background pattern --}}
        <div class="absolute inset-0 z-0 opacity-10"
            style="background-image: radial-gradient(#2d3748 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="max-w-7xl mx-auto px-4 lg:px-8 relative z-10">

            {{-- Header and Language Info --}}
            <div class="text-center mb-8 md:mb-16 animate-fadeInUp">
                <div class="text-7xl mb-4 transform hover:scale-110 transition-transform duration-300">{{
                    $language->icon ?? '🌍' }}</div>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-white/95 drop-shadow-lg">
                    Dive into {{ $language->name }} Vocabulary
                </h1>
                <p class="text-gray-300 mt-4 text-lg md:text-xl max-w-3xl mx-auto">
                    {{ $language->description ?? 'Explore a rich collection of words, phrases, and examples from this
                    vibrant language.' }}
                </p>

                <a href="{{ route('languages.show', $language) }}"
                    class="inline-flex items-center text-blue-400 hover:text-blue-300 hover:underline mt-6 font-medium transition duration-200 group">
                    <svg class="w-5 h-5 mr-1 group-hover:-translate-x-1 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Learn more about the {{ $language->name }} Community
                </a>
            </div>

            {{-- Filter Button for Mobile --}}
            <div class="lg:hidden text-center mb-8">
                <button id="toggleSidebarBtn"
                    class="inline-flex items-center justify-center px-6 py-3 bg-purple-600 hover:bg-purple-700 active:bg-purple-800 text-white font-semibold rounded-full shadow-lg transition duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-4 focus:ring-purple-500/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                    Filter Categories
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 md:gap-10">
                {{-- Sidebar: Categories --}}
                <aside id="sidebar"
                    class="lg:col-span-1 mt-20 bg-gray-800 p-6 shadow-xl lg:rounded-2xl border border-gray-700 animate-slideInLeft overflow-y-auto hidden lg:block fixed inset-y-0 left-0 w-64 z-40 lg:static lg:w-auto">
                    <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
                        <h2 class="text-2xl font-bold text-white">Categories</h2>
                        <button id="closeSidebarBtn"
                            class="lg:hidden text-gray-400 hover:text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('languages.entries', $language->slug) }}"
                                class="block p-3 rounded-lg text-base transition duration-200 ease-in-out
                                        {{ request()->get('category') ? 'text-gray-300 hover:bg-gray-700' : 'bg-purple-600 text-white font-bold shadow-lg shadow-purple-500/20' }}">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    All Entries
                                </span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('languages.entries', [$language->slug, 'category' => $category->slug]) }}"
                                class="flex items-center text-base gap-3 p-3 rounded-lg transition duration-200 ease-in-out
                                        {{ request()->get('category') === $category->slug ? 'bg-purple-600 text-white font-bold shadow-lg shadow-purple-500/20' : 'text-gray-300 hover:bg-gray-700' }}">
                                <span>{{ $category->icon ?? '📁' }}</span>
                                <span>{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </aside>

                {{-- Overlay for mobile sidebar --}}
                <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-20 hidden lg:hidden"></div>

                {{-- Main Content --}}
                <main class="lg:col-span-4 space-y-8">

                    {{-- Search Input --}}
                    <div class="mb-6 animate-fadeInUp delay-100">
                        <div class="relative">
                            <input type="text" id="searchInput" value="{{ request()->get('search') }}"
                                placeholder="Search words, translations, or examples..."
                                class="w-full bg-gray-800 border border-gray-700 rounded-xl pl-12 pr-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 text-lg">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-7 w-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- Entries Grid Container --}}
                    @if($entries->count())
                    <div id="entriesGrid"
                        class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-6 animate-fadeInScale">
                        @foreach ($entries as $entry)
                        <div class="entry-card bg-gray-800 rounded-2xl p-5 border border-gray-700 shadow-lg hover:border-emerald-500 transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl group"
                            data-word="{{ strtolower($entry->word) }}"
                            data-translation="{{ strtolower($entry->translation_en) }}"
                            data-example="{{ strtolower($entry->example_sentence ?? '') }}">

                            {{-- Image at the top --}}
                            @if($entry->image_path)
                            <div
                                class="mb-4 overflow-hidden rounded-lg bg-gray-900 flex items-center justify-center h-24 md:h-34 lg:h-40">
                                <img src="{{ asset('storage/' . $entry->image_path) }}" alt="{{ $entry->word }}"
                                    class="w-full h-full object-contain p-2 group-hover:scale-105 transition-transform duration-300 ease-in-out">
                            </div>
                            @else
                            <div
                                class="mb-4 h-24 md:h-34 lg:h-40 bg-gray-900 rounded-lg flex items-center justify-center text-gray-500 text-opacity-50">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            @endif

                            {{-- Word + Translation --}}
                            <div class="mb-3">
                                <h3 class="text-xl lg:text-3xl font-extrabold text-white leading-tight entry-word mb-1">
                                    {{ $entry->word }}
                                </h3>
                                <p class="text-emerald-400 text-base lg:text-lg font-semibold entry-translation">
                                    {{ $entry->translation_en }}
                                </p>
                            </div>

                            {{-- Example Sentence --}}
                            @if($entry->example_sentence)
                            <p class="text-sm text-gray-400 italic mb-3 entry-example">"{{ $entry->example_sentence }}"
                            </p>
                            @endif

                            {{-- Audio --}}
                            @if($entry->audio_path)
                            <audio controls class="w-full mt-auto mb-0 block">
                                <source src="{{ asset('storage/' . $entry->audio_path) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            @else
                            <div class="w-full text-xs mt-auto mb-0 block text-gray-500 md:text-sm text-center">
                                Audio coming soon!
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination (might need to be hidden/disabled for live search, or handled via AJAX for large
                    datasets) --}}
                    @if ($entries->hasPages())
                    <div id="paginationLinks" class="mt-10 animate-fadeInUp delay-200">
                        {{ $entries->links('pagination::tailwind') }}
                    </div>
                    @endif

                    @else
                    {{-- Empty State (initial state if no entries from server) --}}
                    <div id="noEntriesFoundInitial"
                        class="text-center py-20 lg:col-span-4 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 animate-fadeInUp">
                        <div class="text-7xl mb-6">📭</div>
                        <h3 class="text-3xl font-bold mb-3 text-white">No Entries Found Yet!</h3>
                        <p class="text-gray-400 text-lg max-w-md mx-auto">
                            It seems there are no words matching your search or category. Try broadening your search or
                            selecting "All Entries" to see everything.
                        </p>
                        <a href="{{ route('languages.entries', $language->slug) }}"
                            class="mt-8 inline-flex items-center bg-purple-600 hover:bg-purple-700 active:bg-purple-800 text-white font-semibold py-3 px-7 rounded-full transition duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-purple-500/50">
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
                    <div id="noResultsFoundJS"
                        class="text-center py-20 lg:col-span-4 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 hidden">
                        <div class="text-7xl mb-6">🔍</div>
                        <h3 class="text-3xl font-bold mb-3 text-white">No Matches Found!</h3>
                        <p class="text-gray-400 text-lg max-w-md mx-auto">
                            Your search yielded no results in this category. Try a different search term or select "All
                            Entries."
                        </p>
                        <button onclick="document.getElementById('searchInput').value = ''; filterEntries();"
                            class="mt-8 inline-block bg-purple-600 hover:bg-purple-700 active:bg-purple-800 text-white font-semibold py-3 px-7 rounded-full transition duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-purple-500/50">
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
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const entriesGrid = document.getElementById('entriesGrid');
            const entryCards = document.querySelectorAll('.entry-card');
            const initialEmptyState = document.getElementById('noEntriesFoundInitial');
            const jsEmptyState = document.getElementById('noResultsFoundJS');
            const paginationLinks = document.getElementById('paginationLinks');

            // Mobile Sidebar elements
            const sidebar = document.getElementById('sidebar');
            const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Function to filter entries based on search term
            window.filterEntries = function() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                entryCards.forEach(card => {
                    const word = card.dataset.word;
                    const translation = card.dataset.translation;
                    const example = card.dataset.example;

                    if (word.includes(searchTerm) || translation.includes(searchTerm) || example.includes(searchTerm)) {
                        card.style.display = ''; // Show the card
                        visibleCount++;
                    } else {
                        card.style.display = 'none'; // Hide the card
                    }
                });

                // Handle empty states based on filter results
                if (visibleCount === 0) {
                    if (entriesGrid) entriesGrid.style.display = 'none';
                    if (paginationLinks) paginationLinks.style.display = 'none';
                    if (initialEmptyState) initialEmptyState.style.display = 'none';
                    if (jsEmptyState) jsEmptyState.style.display = 'block';
                } else {
                    if (entriesGrid) entriesGrid.style.display = 'grid';
                    if (paginationLinks && !searchTerm) paginationLinks.style.display = 'block';
                    else if (paginationLinks) paginationLinks.style.display = 'none';
                    if (initialEmptyState) initialEmptyState.style.display = 'none';
                    if (jsEmptyState) jsEmptyState.style.display = 'none';
                }
            };

            // Event listener for input changes (typing)
            searchInput.addEventListener('keyup', filterEntries);
            searchInput.addEventListener('change', filterEntries);

            // Run filter on initial load if there's a search term from the URL
            if (searchInput.value) {
                filterEntries();
            } else {
                if (jsEmptyState) jsEmptyState.style.display = 'none';
                if (initialEmptyState && entryCards.length === 0) initialEmptyState.style.display = 'block';
                else if (initialEmptyState) initialEmptyState.style.display = 'none';
            }

            // If there are no entries initially, hide the grid and show initial empty state
            if (entryCards.length === 0) {
                if (entriesGrid) entriesGrid.style.display = 'none';
                if (paginationLinks) paginationLinks.style.display = 'none';
                if (initialEmptyState) initialEmptyState.style.display = 'block';
            }

            // --- Mobile Sidebar Toggle Logic ---
            const toggleSidebar = () => {
                const isHidden = sidebar.classList.contains('hidden');
                if (isHidden) {
                    // Show sidebar
                    sidebar.classList.remove('hidden');
                    sidebarOverlay.classList.remove('hidden');
                    // Trigger animations
                    sidebar.classList.add('sidebar-enter-active');
                    sidebarOverlay.classList.add('overlay-enter-active');
                    setTimeout(() => {
                        sidebar.classList.remove('sidebar-enter-active', 'sidebar-enter-from');
                        sidebarOverlay.classList.remove('overlay-enter-active', 'overlay-enter-from');
                    }, 300); // Match transition duration
                } else {
                    // Hide sidebar
                    sidebar.classList.add('sidebar-leave-active');
                    sidebarOverlay.classList.add('overlay-leave-active');
                    setTimeout(() => {
                        sidebar.classList.add('hidden');
                        sidebarOverlay.classList.add('hidden');
                        sidebar.classList.remove('sidebar-leave-active', 'sidebar-leave-to');
                        sidebarOverlay.classList.remove('overlay-leave-active', 'overlay-leave-to');
                    }, 300); // Match transition duration
                }
                // Toggle body overflow to prevent scrolling content behind sidebar
                document.body.classList.toggle('overflow-hidden', isHidden);
            };

            if (toggleSidebarBtn) {
                toggleSidebarBtn.addEventListener('click', toggleSidebar);
            }
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', toggleSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', toggleSidebar); // Close sidebar when clicking overlay
            }

            // Close sidebar when a category link is clicked on mobile
            document.querySelectorAll('#sidebar ul a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) { // Only on small screens (less than lg)
                        toggleSidebar();
                    }
                });
            });

            // Handle resize: If resized to desktop, ensure sidebar is visible and overlay is hidden
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) { // lg breakpoint
                    sidebar.classList.remove('hidden', 'sidebar-enter-active', 'sidebar-leave-active');
                    sidebar.style.transform = ''; // Clear any transform from JS
                    sidebar.style.opacity = ''; // Clear any opacity from JS
                    sidebarOverlay.classList.add('hidden');
                    sidebarOverlay.classList.remove('overlay-enter-active', 'overlay-leave-active');
                    document.body.classList.remove('overflow-hidden');
                } else {
                    // On mobile, if sidebar was open, keep it open, otherwise keep hidden
                    // This handles cases where user resizes from desktop to mobile
                    if (!sidebar.classList.contains('hidden')) {
                        document.body.classList.add('overflow-hidden');
                    }
                }
            });
        });
    </script>
    @endpush
</x-layouts.app.guest>