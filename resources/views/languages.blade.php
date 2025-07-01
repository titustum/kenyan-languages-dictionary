<x-layouts.app.guest>

    @push('styles')
    <style>
        /* Add some subtle animations for filtering */
        .language-card.fade-out {
            opacity: 0;
            transform: scale(0.95) translateY(10px);
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
        }

        .language-card.fade-in {
            opacity: 1;
            transform: scale(1) translateY(0);
            transition: opacity 0.3s ease-in, transform 0.3s ease-in;
        }
    </style>
    @endpush

    <section id="languages"
        class="py-24 bg-gradient-to-br from-white via-gray-50 to-gray-100 dark:from-gray-900 dark:via-slate-900 dark:to-gray-800 relative overflow-hidden transition-colors duration-500">

        {{-- Subtle background pattern --}}
        <div class="absolute inset-0 z-0 opacity-10"
            style="background-image: radial-gradient(#D1D5DB 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="absolute inset-0 z-0 opacity-10 dark:opacity-10"
            style="background-image: radial-gradient(#2d3748 1px, transparent 1px); background-size: 20px 20px;"></div>


        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
            <div class="text-center mb-20">
                <div
                    class="inline-flex items-center px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full text-emerald-600 dark:text-emerald-400 text-sm font-medium mb-6">
                    <span class="w-2 h-2 bg-emerald-600 dark:bg-emerald-400 rounded-full mr-2 animate-pulse"></span>
                    Linguistic Diversity
                </div>
                <h2
                    class="text-5xl md:text-6xl py-2 font-bold mb-8 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 dark:from-white dark:via-blue-100 dark:to-emerald-200 bg-clip-text text-transparent">
                    Explore Kenya's Languages
                </h2>
                <p class="text-xl text-gray-700 dark:text-gray-300 max-w-4xl mx-auto leading-relaxed">
                    From the highlands of Kikuyu to the pastoral lands of Turkana, discover the rich linguistic tapestry
                    that weaves through Kenya's cultural heritage
                </p>

                <div class="max-w-md mx-auto mt-10">
                    <div class="relative">
                        <input type="text" id="languageSearchInput" placeholder="Search languages..."
                            class="w-full px-6 py-4 bg-white/50 dark:bg-black/10 backdrop-blur-sm border border-gray-300 dark:border-white/20 rounded-2xl text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500/50 transition-all">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Make sure the regions array exists and is passed to the view --}}
            @php
            $regions = [
            'Nyanza Kenya',
            'Western Kenya',
            'Rift Valley',
            'Central Kenya',
            'Coastal Kenya',
            'Northern Kenya',
            'Eastern Kenya',
            ];
            @endphp

            <div id="filterTagsContainer" class="my-12 flex flex-wrap justify-center gap-3">
                <button data-region-slug="all"
                    class="filter-tag px-4 py-2 bg-emerald-600 border border-emerald-600 rounded-full text-sm text-white hover:bg-emerald-700 hover:text-white transition-all duration-300 font-semibold shadow-lg">
                    All Regions
                </button>
                @foreach ($regions as $region)
                <button data-region-slug="{{ Str::slug($region) }}"
                    class="filter-tag px-4 py-2 bg-white/70 dark:bg-black/10 backdrop-blur-sm border border-gray-300 dark:border-white/20 rounded-full text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-black/20 hover:text-gray-900 dark:hover:text-white transition-all duration-300">
                    {{ $region }}
                </button>
                @endforeach
            </div>

            <div id="languagesGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
                @php
                $enhancedColors = [
                'red' => 'from-red-500 to-red-600 shadow-red-500/25 text-white',
                'yellow' => 'from-yellow-400 to-yellow-500 shadow-yellow-500/25 text-gray-900',
                'green' => 'from-green-500 to-green-600 shadow-green-500/25 text-white',
                'blue' => 'from-blue-500 to-blue-600 shadow-blue-500/25 text-white',
                'indigo' => 'from-indigo-500 to-indigo-600 shadow-indigo-500/25 text-white',
                'purple' => 'from-purple-500 to-purple-600 shadow-purple-500/25 text-white',
                'pink' => 'from-pink-500 to-pink-600 shadow-pink-500/25 text-white',
                'orange' => 'from-orange-500 to-orange-600 shadow-orange-500/25 text-white',
                'teal' => 'from-teal-500 to-teal-600 shadow-teal-500/25 text-white',
                'cyan' => 'from-cyan-500 to-cyan-600 shadow-cyan-500/25 text-white',
                'amber' => 'from-amber-400 to-amber-500 shadow-amber-500/25 text-gray-900',
                'lime' => 'from-lime-400 to-lime-500 shadow-lime-500/25 text-gray-900',
                'gray' => 'from-gray-500 to-gray-600 shadow-gray-500/25 text-white',
                'rose' => 'from-rose-500 to-rose-600 shadow-rose-500/25 text-white',
                'brown' => 'from-yellow-800 to-yellow-900 shadow-yellow-800/25 text-white',
                ];
                @endphp

                @foreach ($languages as $language)
                <a href="{{ route('languages.entries', $language) }}"
                    class="language-card group relative bg-gradient-to-br {{ $enhancedColors[$language->color] ?? 'from-gray-700 to-gray-800 shadow-gray-700/25 text-white' }} dark:from-gray-700 dark:to-gray-800 dark:text-white rounded-2xl p-6 text-center cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-gray-200 dark:border-white/10 backdrop-blur-sm"
                    role="button" tabindex="0"
                    aria-label="Explore {{ $language->name }} language from {{ $language->region }}"
                    data-name="{{ strtolower($language->name) }}" data-region="{{ Str::slug($language->region) }}">

                    <div
                        class="absolute inset-0 rounded-2xl bg-gradient-to-br {{ str_replace('shadow-', 'from-', explode(' ', $enhancedColors[$language->color] ?? 'shadow-gray-700/25')[2]) }}/0 group-hover:{{ str_replace('shadow-', 'from-', explode(' ', $enhancedColors[$language->color] ?? 'shadow-gray-700/25')[2]) }}/20 transition-all duration-300">
                    </div>

                    <div class="relative z-10">
                        <div class="text-4xl mb-4 transform group-hover:scale-110 transition-transform duration-300">
                            {{ $language->icon ?? '🗣️' }}
                        </div>
                        <div class="font-bold text-lg mb-2 text-white dark:text-white">{{ $language->name }}</div>
                        <div class="text-sm opacity-90 text-gray-200 dark:text-gray-400 mb-3">{{ $language->region }}
                        </div>

                        {{-- <div
                            class="text-xs opacity-75 flex justify-center items-center space-x-2 text-gray-200 dark:text-gray-400">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $language->words_count ?? rand(150, 800) }} words
                            </span>
                            <span>•</span>
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.369 4.369 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z">
                                    </path>
                                </svg>
                                {{ $language->audio_count ?? rand(50, 300) }} audio
                            </span>
                        </div> --}}

                        {{-- <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                            <svg class="w-4 h-4 text-white dark:text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div> --}}
                    </div>
                </a>
                @endforeach
            </div>

            {{-- Empty State for JS filtering --}}
            <div id="noLanguagesFoundJS"
                class="text-center py-20 bg-gray-100 dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 hidden mt-10 transition-colors duration-500">
                <div class="text-7xl mb-6">🚫</div>
                <h3 class="text-3xl font-bold mb-3 text-gray-900 dark:text-white">No Languages Found!</h3>
                <p class="text-gray-600 dark:text-gray-400 text-lg max-w-md mx-auto">
                    No languages match your current search and filter criteria. Try adjusting them.
                </p>
                <button onclick="resetFilters();"
                    class="mt-8 inline-flex items-center bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold py-3 px-7 rounded-full transition duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-emerald-500/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004 16.08V12m4.214-1.214L11.99 15.01"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 20v-5h-.582m-15.356-2A8.001 8.001 0 0120 7.92V12m-4.214 1.214L12.01 8.99"></path>
                    </svg>
                    Reset Filters
                </button>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('languageSearchInput');
            const filterTagsContainer = document.getElementById('filterTagsContainer');
            const languageCards = document.querySelectorAll('.language-card');
            const noLanguagesFoundState = document.getElementById('noLanguagesFoundJS');
            let currentRegionFilter = 'all'; // Default filter

            // Function to filter languages
            const filterLanguages = () => {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                languageCards.forEach(card => {
                    const languageName = card.dataset.name;
                    const languageRegion = card.dataset.region;

                    const matchesSearch = languageName.includes(searchTerm);
                    const matchesRegion = currentRegionFilter === 'all' || languageRegion === currentRegionFilter;

                    if (matchesSearch && matchesRegion) {
                        card.classList.remove('fade-out');
                        card.classList.add('fade-in');
                        card.style.display = 'block'; // Show the card
                        visibleCount++;
                    } else {
                        card.classList.remove('fade-in');
                        card.classList.add('fade-out');
                        // Use a slight delay for display: none to allow fade-out animation to complete
                        setTimeout(() => {
                               if (card.classList.contains('fade-out')) {
                                   card.style.display = 'none';
                               }
                        }, 300); // Matches transition duration
                    }
                });

                // Show/hide no results message
                if (visibleCount === 0) {
                    noLanguagesFoundState.style.display = 'block';
                } else {
                    noLanguagesFoundState.style.display = 'none';
                }
            };

            // Event listener for search input
            searchInput.addEventListener('keyup', filterLanguages);
            searchInput.addEventListener('change', filterLanguages);

            // Event listeners for region filter tags
            filterTagsContainer.addEventListener('click', function(event) {
                const target = event.target.closest('.filter-tag'); // Use closest to handle clicks on child spans
                if (!target) return; // Not a filter tag

                // Remove active state from all tags
                document.querySelectorAll('.filter-tag').forEach(tag => {
                    tag.classList.remove('bg-emerald-600', 'border-emerald-600', 'font-semibold', 'shadow-lg');
                    // Ensure these are set for light mode default
                    tag.classList.add('bg-white/70', 'border-gray-300', 'text-gray-700', 'hover:bg-gray-200', 'dark:bg-black/10', 'dark:border-white/20', 'dark:text-gray-300', 'dark:hover:bg-black/20');
                });

                // Add active state to the clicked tag
                target.classList.add('bg-emerald-600', 'border-emerald-600', 'font-semibold', 'shadow-lg');
                // Remove the general styles that conflict with active state
                target.classList.remove('bg-white/70', 'border-gray-300', 'text-gray-700', 'hover:bg-gray-200', 'dark:bg-black/10', 'dark:border-white/20', 'dark:text-gray-300', 'dark:hover:bg-black/20');


                currentRegionFilter = target.dataset.regionSlug;
                filterLanguages();
            });

            // Global function to reset all filters
            window.resetFilters = function() {
                searchInput.value = ''; // Clear search input
                // Set 'All Regions' button as active
                document.querySelector('.filter-tag[data-region-slug="all"]').click(); // Simulate a click to update state and filter
            };

            // Initial filter when page loads (e.g., if search term was in URL)
            filterLanguages();
        });
    </script>
    @endpush


    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('languageSearchInput');
            const filterTagsContainer = document.getElementById('filterTagsContainer');
            const languageCards = document.querySelectorAll('.language-card');
            const noLanguagesFoundState = document.getElementById('noLanguagesFoundJS');
            let currentRegionFilter = 'all'; // Default filter

            // Function to filter languages
            const filterLanguages = () => {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                languageCards.forEach(card => {
                    const languageName = card.dataset.name;
                    const languageRegion = card.dataset.region;

                    const matchesSearch = languageName.includes(searchTerm);
                    const matchesRegion = currentRegionFilter === 'all' || languageRegion === currentRegionFilter;

                    if (matchesSearch && matchesRegion) {
                        card.classList.remove('fade-out');
                        card.classList.add('fade-in');
                        card.style.display = 'block'; // Show the card
                        visibleCount++;
                    } else {
                        card.classList.remove('fade-in');
                        card.classList.add('fade-out');
                        // Use a slight delay for display: none to allow fade-out animation to complete
                        setTimeout(() => {
                             if (card.classList.contains('fade-out')) {
                                card.style.display = 'none';
                             }
                        }, 300); // Matches transition duration
                    }
                });

                // Show/hide no results message
                if (visibleCount === 0) {
                    noLanguagesFoundState.style.display = 'block';
                } else {
                    noLanguagesFoundState.style.display = 'none';
                }
            };

            // Event listener for search input
            searchInput.addEventListener('keyup', filterLanguages);
            searchInput.addEventListener('change', filterLanguages);

            // Event listeners for region filter tags
            filterTagsContainer.addEventListener('click', function(event) {
                const target = event.target.closest('.filter-tag'); // Use closest to handle clicks on child spans
                if (!target) return; // Not a filter tag

                // Remove active state from all tags
                document.querySelectorAll('.filter-tag').forEach(tag => {
                    tag.classList.remove('bg-emerald-600', 'border-emerald-600', 'font-semibold', 'shadow-lg');
                    tag.classList.add('bg-white/10', 'border-white/20', 'text-gray-300', 'hover:bg-white/20');
                });

                // Add active state to the clicked tag
                target.classList.add('bg-emerald-600', 'border-emerald-600', 'font-semibold', 'shadow-lg');
                target.classList.remove('bg-white/10', 'border-white/20', 'text-gray-300', 'hover:bg-white/20');

                currentRegionFilter = target.dataset.regionSlug;
                filterLanguages();
            });

            // Global function to reset all filters
            window.resetFilters = function() {
                searchInput.value = ''; // Clear search input
                // Set 'All Regions' button as active
                document.querySelector('.filter-tag[data-region-slug="all"]').click(); // Simulate a click to update state and filter
            };

            // Initial filter when page loads (e.g., if search term was in URL)
            filterLanguages();
        });
    </script>
    @endpush
</x-layouts.app.guest>