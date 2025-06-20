<x-layouts.app.guest :language="($language?->name ?? 'English Concepts')">
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
        <div class="absolute inset-0 z-0 opacity-10"
            style="background-image: radial-gradient(#2d3748 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="max-w-7xl mx-auto px-4 lg:px-8 relative z-10">

            {{-- Header --}}
            <div class="text-center mb-8 md:mb-16 animate-fadeInUp">
                <div class="text-7xl mb-4 transform hover:scale-110 transition">💡</div>
                <h1 class="text-4xl md:text-5xl font-extrabold">Browse Core English Concepts</h1>
                <p class="text-gray-300 mt-4 text-lg md:text-xl mx-auto max-w-3xl">
                    Explore the central concepts in our dictionary. Know a translation? Contribute it!
                </p>
                @auth
                <a href="{{ route('contribute.create') }}"
                    class="inline-flex items-center text-emerald-400 hover:text-emerald-300 mt-6">
                    <svg class="w-5 h-5 mr-1">...</svg>
                    Contribute a New English Concept
                </a>
                @endauth
            </div>

            {{-- Language Selector --}}
            @if (!$language)
            <div class="text-center mb-12">
                <form method="GET" action="{{ route('concepts.index') }}">
                    <label for="lang" class="block text-xl font-semibold">Choose translation language:</label>
                    <select name="lang" id="lang" class="bg-gray-800 text-white px-4 py-2 rounded-md" required>
                        <option value="">-- Select --</option>
                        @foreach ($languages as $lang)
                        <option value="{{ $lang->slug }}">{{ $lang->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="ml-4 px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md">Continue</button>
                </form>
            </div>
            @else
            <div class="mb-6 text-right">
                <form method="GET" action="{{ route('concepts.index') }}">
                    <input type="hidden" name="category" value="{{ request()->get('category') }}">
                    <label for="lang" class="text-white mr-2">Translating into:</label>
                    <select name="lang" id="lang" onchange="this.form.submit()"
                        class="bg-gray-700 text-white px-3 py-1 rounded-md">
                        @foreach ($languages as $lang)
                        <option value="{{ $lang->slug }}" @selected($lang->id === $language->id)>
                            {{ $lang->name }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
            @endif

            {{-- Sidebar & Grid Layout --}}
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 md:gap-10">
                {{-- Sidebar omitted for brevity … --}}
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
                            <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}"
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
                            <a href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}"
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
                <main class="lg:col-span-4 space-y-8">
                    @if(session('success'))
                    <div class="mb-4 p-4 bg-green-600 rounded">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                    <div class="mb-4 p-4 bg-red-600 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Search Input --}}
                    <div class="mb-6 animate-fadeInUp">
                        <div class="relative">
                            <input id="searchInput" value="{{ request('search') }}"
                                placeholder="Search English words, descriptions, or examples…"
                                class="w-full bg-gray-800 border-gray-700 rounded-xl pl-12 pr-4 py-3 text-white placeholder-gray-400 focus:ring-purple-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-7 w-7 text-gray-400">...</svg>
                            </div>
                        </div>
                    </div>

                    {{-- Concept Cards --}}
                    @if($mainEntries->count())
                    <div id="entriesGrid"
                        class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 animate-fadeInScale">
                        @foreach ($mainEntries as $mainEntry)
                        <div
                            class="concept-card bg-gray-800 rounded-2xl p-4 border-gray-700 shadow-lg hover:border-emerald-500 transition">
                            {{-- Image --}}
                            @if($mainEntry->image_path)
                            <img src="{{ $mainEntry->image_url }}" alt="{{ $mainEntry->word_en }}"
                                class="w-full h-32 object-contain rounded-lg mb-4">
                            @else
                            <div
                                class="w-full h-32 bg-gray-900 rounded-lg mb-4 flex items-center justify-center text-gray-500">
                                <svg class="w-16 h-16">...</svg>
                            </div>
                            @endif

                            {{-- Word & Category --}}
                            <h3 class="text-xl font-bold mb-1">{{ $mainEntry->word_en }}</h3>
                            <p class="text-gray-400 text-sm mb-3">Category: {{ $mainEntry->category->name }}</p>

                            {{-- Translation Form --}}
                            @if ($language)
                            <form action="{{ route('contribute.translation.store') }}" method="POST" class="space-y-2">
                                @csrf
                                <input type="hidden" name="main_entry_id" value="{{ $mainEntry->id }}">
                                <input type="hidden" name="language_id" value="{{ $language->id }}">

                                <input name="word" placeholder="Translation in {{ $language->name }}"
                                    class="w-full bg-gray-700 text-white rounded-md border-gray-600 py-2 px-3" required>

                                <button type="submit"
                                    class="w-full px-4 py-2 bg-emerald-600 hover:bg-emerald-700 rounded-md">
                                    Submit
                                </button>
                            </form>
                            @else
                            <p class="text-sm italic text-gray-400">Select a language above to contribute.</p>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div id="paginationLinks" class="mt-10">
                        {{ $mainEntries->appends([
                        'lang' => $langSlug,
                        'category' => request('category'),
                        'search' => request('search'),
                        ])->links('pagination::tailwind') }}
                    </div>
                    @else
                    {{-- No Results Empty State --}}
                    <div class="text-center py-20 bg-gray-800 rounded-2xl shadow-xl border-gray-700">
                        <div class="text-7xl mb-6">📭</div>
                        <h3 class="text-3xl font-bold">No Concepts Found!</h3>
                        <p class="text-gray-400 mt-3">Try a different filter or contribute a new concept.</p>
                        @auth
                        <a href="{{ route('contribute.create') }}"
                            class="mt-8 inline-flex items-center bg-purple-600 hover:bg-purple-700 text-white py-3 px-7 rounded-full">
                            <svg class="w-5 h-5 mr-2">...</svg>
                            Add Your First Concept
                        </a>
                        @endauth
                    </div>
                    @endif
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