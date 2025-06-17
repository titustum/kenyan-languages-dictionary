<x-layouts.app.guest language="English Concepts"> {{-- Language name here is for the overall page context --}}
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

            {{-- Header and Language Info (Adjusted for Main Concepts) --}}
            <div class="text-center mb-8 md:mb-16 animate-fadeInUp">
                <div class="text-7xl mb-4 transform hover:scale-110 transition-transform duration-300">💡</div>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-white/95 drop-shadow-lg">
                    Browse Core English Concepts
                </h1>
                <p class="text-gray-300 mt-4 text-lg md:text-xl max-w-3xl mx-auto">
                    Explore the central concepts in our dictionary. If you know a translation, contribute it!
                </p>

                {{-- Link to contribute a new English concept (likely for admins) --}}
                @auth
                <a href="{{ route('contribute.create') }}"
                    class="inline-flex items-center text-emerald-400 hover:text-emerald-300 hover:underline mt-6 font-medium transition duration-200 group">
                    <svg class="w-5 h-5 mr-1 group-hover:-translate-x-1 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Contribute a New English Concept
                </a>
                @endauth
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
                            {{-- This route should filter main concepts, not language entries --}}
                            <a href="{{ route('concepts.index') }}"
                                class="block p-3 rounded-lg text-base transition duration-200 ease-in-out
                                        {{ request()->get('category') ? 'text-gray-300 hover:bg-gray-700' : 'bg-purple-600 text-white font-bold shadow-lg shadow-purple-500/20' }}">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    All Concepts
                                </span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            {{-- This route should filter main concepts by category --}}
                            <a href="{{ route('concepts.index', ['category' => $category->slug]) }}"
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
                                placeholder="Search English words, descriptions, or examples..."
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

                    {{-- Concepts Grid Container --}}
                    @if($mainEntries->count())
                    <div id="entriesGrid"
                        class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-3 animate-fadeInScale">
                        @foreach ($mainEntries as $mainEntry)
                        <div class="concept-card bg-gray-800 rounded-2xl p-2 border border-gray-700 shadow-lg hover:border-emerald-500 transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl group"
                            data-word-en="{{ strtolower($mainEntry->word_en) }}"
                            data-description-en="{{ strtolower($mainEntry->description_en ?? '') }}"
                            data-example-en="{{ strtolower($mainEntry->example_sentence_en ?? '') }}"
                            data-category-slug="{{ $mainEntry->category->slug ?? '' }}">

                            {{-- Image at the top --}}
                            @if($mainEntry->image_path)
                            <div
                                class="mb-4 overflow-hidden rounded-lg bg-gray-900 flex items-center justify-center h-28 md:h-34 lg:h-40">
                                <img src="{{ $mainEntry->image_url }}" alt="{{ $mainEntry->word_en }}"
                                    class="w-full h-full object-contain p-2 group-hover:scale-105 transition-transform duration-300 ease-in-out"
                                    onerror="this.onerror=null;this.src='{{ asset('images/placeholder.png') }}';">
                            </div>
                            @else
                            <div
                                class="mb-4 h-28 md:h-34 lg:h-40 bg-gray-900 rounded-lg flex items-center justify-center text-gray-500 text-opacity-50">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            @endif

                            {{-- English Word & Category --}}
                            <div class="mb-3">
                                <h3
                                    class="text-xl lg:text-3xl font-extrabold text-white leading-tight concept-word mb-1">
                                    {{ $mainEntry->word_en }}
                                </h3>
                                <p class="text-gray-400 text-sm lg:text-base font-semibold">
                                    Category: {{ $mainEntry->category->name ?? 'Uncategorized' }}
                                </p>
                            </div>

                            {{-- English Description (Optional) --}}
                            @if($mainEntry->description_en)
                            <p class="text-sm text-gray-400 mb-3 concept-description">
                                {{ Str::limit($mainEntry->description_en, 80) }}
                            </p>
                            @endif

                            {{-- English Example Sentence (Optional) --}}
                            @if($mainEntry->example_sentence_en)
                            <p class="text-sm text-gray-400 italic mb-3 concept-example">
                                "{{ Str::limit($mainEntry->example_sentence_en, 80) }}"
                            </p>
                            @endif

                            {{-- Add Translation Link/Button --}}
                            <div class="w-full mt-auto pt-4 border-t border-gray-700">
                                <a href="{{ route('contribute.translation.create', ['mainEntry' => $mainEntry->slug_en]) }}"
                                    class="block w-full text-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition font-medium">
                                    Add Translation
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination Links --}}
                    @if ($mainEntries->hasPages())
                    <div id="paginationLinks" class="mt-10 animate-fadeInUp delay-200">
                        {{ $mainEntries->links('pagination::tailwind') }}
                    </div>
                    @endif

                    @else
                    {{-- Empty State (initial state if no entries from server) --}}
                    <div id="noEntriesFoundInitial"
                        class="text-center py-20 lg:col-span-4 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 animate-fadeInUp">
                        <div class="text-7xl mb-6">📭</div>
                        <h3 class="text-3xl font-bold mb-3 text-white">No Concepts Found Yet!</h3>
                        <p class="text-gray-400 text-lg max-w-md mx-auto">
                            It seems there are no English concepts matching your criteria.
                        </p>
                        @auth {{-- Suggest contributing if logged in --}}
                        <a href="{{ route('contribute.create') }}"
                            class="mt-8 inline-flex items-center bg-purple-600 hover:bg-purple-700 active:bg-purple-800 text-white font-semibold py-3 px-7 rounded-full transition duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-purple-500/50">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Your First Concept
                        </a>
                        @endauth
                    </div>
                    @endif

                    {{-- Empty State for JS filtering --}}
                    <div id="noResultsFoundJS"
                        class="text-center py-20 lg:col-span-4 bg-gray-800 rounded-2xl shadow-xl border border-gray-700 hidden">
                        <div class="text-7xl mb-6">🔍</div>
                        <h3 class="text-3xl font-bold mb-3 text-white">No Matches Found!</h3>
                        <p class="text-gray-400 text-lg max-w-md mx-auto">
                            Your search yielded no results. Try a different search term or clear the filter.
                        </p>
                        <button onclick="document.getElementById('searchInput').value = ''; filterConcepts();"
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
            const conceptsGrid = document.getElementById('entriesGrid'); // Renamed for clarity
            const conceptCards = document.querySelectorAll('.concept-card'); // Renamed for clarity
            const initialEmptyState = document.getElementById('noEntriesFoundInitial');
            const jsEmptyState = document.getElementById('noResultsFoundJS');
            const paginationLinks = document.getElementById('paginationLinks');

            // Mobile Sidebar elements
            const sidebar = document.getElementById('sidebar');
            const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Function to filter concepts based on search term and category
            window.filterConcepts = function() { // Renamed function for clarity
                const searchTerm = searchInput.value.toLowerCase().trim();
                const urlParams = new URLSearchParams(window.location.search);
                const currentCategorySlug = urlParams.get('category'); // Get category from URL
                let visibleCount = 0;

                conceptCards.forEach(card => {
                    const wordEn = card.dataset.wordEn;
                    const descriptionEn = card.dataset.descriptionEn;
                    const exampleEn = card.dataset.exampleEn;
                    const categorySlug = card.dataset.categorySlug;

                    const matchesSearch = wordEn.includes(searchTerm) ||
                                          descriptionEn.includes(searchTerm) ||
                                          exampleEn.includes(searchTerm);

                    const matchesCategory = !currentCategorySlug || categorySlug === currentCategorySlug;

                    if (matchesSearch && matchesCategory) {
                        card.style.display = ''; // Show the card
                        visibleCount++;
                    } else {
                        card.style.display = 'none'; // Hide the card
                    }
                });

                // Handle empty states based on filter results
                if (visibleCount === 0) {
                    if (conceptsGrid) conceptsGrid.style.display = 'none';
                    if (paginationLinks) paginationLinks.style.display = 'none';
                    if (initialEmptyState) initialEmptyState.style.display = 'none';
                    if (jsEmptyState) jsEmptyState.style.display = 'block';
                } else {
                    if (conceptsGrid) conceptsGrid.style.display = 'grid';
                    // Only show pagination if no search term is active
                    if (paginationLinks && !searchTerm && !currentCategorySlug) paginationLinks.style.display = 'block';
                    else if (paginationLinks) paginationLinks.style.display = 'none';
                    if (initialEmptyState) initialEmptyState.style.display = 'none';
                    if (jsEmptyState) jsEmptyState.style.display = 'none';
                }
            };

            // Event listener for input changes (typing)
            searchInput.addEventListener('keyup', window.filterConcepts);
            searchInput.addEventListener('change', window.filterConcepts);

            // Run filter on initial load if there's a search term or category filter from the URL
            if (searchInput.value || new URLSearchParams(window.location.search).get('category')) {
                window.filterConcepts();
            } else {
                // Initial check for overall empty state
                if (conceptCards.length === 0) {
                    if (conceptsGrid) conceptsGrid.style.display = 'none';
                    if (paginationLinks) paginationLinks.style.display = 'none';
                    if (initialEmptyState) initialEmptyState.style.display = 'block';
                } else {
                    if (initialEmptyState) initialEmptyState.style.display = 'none';
                }
                 if (jsEmptyState) jsEmptyState.style.display = 'none'; // Ensure JS empty state is hidden by default
            }


            // --- Mobile Sidebar Toggle Logic ---
            const toggleSidebar = () => {
                const isHidden = sidebar.classList.contains('hidden');
                if (isHidden) {
                    sidebar.classList.remove('hidden');
                    sidebarOverlay.classList.remove('hidden');
                    sidebar.classList.add('sidebar-enter-active');
                    sidebarOverlay.classList.add('overlay-enter-active');
                    setTimeout(() => {
                        sidebar.classList.remove('sidebar-enter-active', 'sidebar-enter-from');
                        sidebarOverlay.classList.remove('overlay-enter-active', 'overlay-enter-from');
                    }, 300);
                } else {
                    sidebar.classList.add('sidebar-leave-active');
                    sidebarOverlay.classList.add('overlay-leave-active');
                    setTimeout(() => {
                        sidebar.classList.add('hidden');
                        sidebarOverlay.classList.add('hidden');
                        sidebar.classList.remove('sidebar-leave-active', 'sidebar-leave-to');
                        sidebarOverlay.classList.remove('overlay-leave-active', 'overlay-leave-to');
                    }, 300);
                }
                document.body.classList.toggle('overflow-hidden', isHidden);
            };

            if (toggleSidebarBtn) {
                toggleSidebarBtn.addEventListener('click', toggleSidebar);
            }
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', toggleSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', toggleSidebar);
            }

            // Close sidebar when a category link is clicked on mobile AND re-run filters
            document.querySelectorAll('#sidebar ul a').forEach(link => {
                link.addEventListener('click', (event) => {
                    if (window.innerWidth < 1024) {
                        setTimeout(() => { // Small delay to allow URL to update before filterConcepts runs
                            toggleSidebar();
                            // Re-run filter after category change on mobile
                            window.filterConcepts();
                        }, 50);
                    }
                });
            });


            // Handle resize: If resized to desktop, ensure sidebar is visible and overlay is hidden
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) { // lg breakpoint
                    sidebar.classList.remove('hidden', 'sidebar-enter-active', 'sidebar-leave-active');
                    sidebar.style.transform = '';
                    sidebar.style.opacity = '';
                    sidebarOverlay.classList.add('hidden');
                    sidebarOverlay.classList.remove('overlay-enter-active', 'overlay-leave-active');
                    document.body.classList.remove('overflow-hidden');
                } else {
                    if (!sidebar.classList.contains('hidden')) {
                        document.body.classList.add('overflow-hidden');
                    }
                }
            });
        });
    </script>
    @endpush
</x-layouts.app.guest>