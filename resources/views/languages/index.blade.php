<x-layouts.app.guest>

    <!-- Languages Showcase -->
    <section id="languages" class="py-20 bg-gray-900 relative overflow-hidden mt-8">
        <!-- Background Animation -->
        <div class="absolute inset-0 opacity-10">
            <div
                class="absolute top-20 left-10 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse">
            </div>
            <div
                class="absolute top-40 right-20 w-40 h-40 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000">
            </div>
            <div
                class="absolute bottom-20 left-1/3 w-36 h-36 bg-green-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl py-2 md:text-5xl font-bold mb-6 bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                    Explore Kenya's Languages
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto leading-relaxed">
                    From Kikuyu to Turkana, discover the linguistic diversity that makes Kenya unique.
                    Click on any language to learn more about its rich heritage.
                </p>
            </div>

            <!-- Search and Filter -->
            <div class="mb-12 flex flex-col md:flex-row gap-4 justify-center items-center">
                <div class="relative">
                    <input type="text" id="languageSearch" placeholder="Search languages..."
                        class="bg-gray-800 border border-gray-700 rounded-full px-6 py-3 pl-12 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-80">
                    <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <select id="regionFilter"
                    class="bg-gray-800 border border-gray-700 rounded-full px-6 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Regions</option>
                    <option value="Central">Central Kenya</option>
                    <option value="Coast">Coast</option>
                    <option value="Western">Western</option>
                    <option value="Northern">Northern</option>
                    <option value="Eastern">Eastern</option>
                    <option value="Rift Valley">Rift Valley</option>
                </select>
            </div>

            @if($languages && $languages->count() > 0)
            <div id="languagesGrid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach ($languages as $language)
                @php
                // $language->color = 'gray'; // Default color if not set
                @endphp
                <a href="{{ route('languages.show', $language) }}"
                    class="language-card group bg-gradient-to-br from-{{ $language->color }}-400 to-{{ $language->color }}-600 rounded-2xl p-6 text-center cursor-pointer shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-{{ $language->color }}-500/25 hover:-translate-y-1"
                    role="button" tabindex="0" data-language-name="{{ strtolower($language->name) }}"
                    data-region="{{ $language->region }}" data-language-id="{{ $language->id ?? '' }}"
                    aria-label="Learn about {{ $language->name }} language from {{ $language->region }}">

                    <!-- Icon with animation -->
                    <div class="text-4xl mb-3 group-hover:scale-110 transition-transform duration-300">
                        {{ $language->icon ?? '🗣️' }}
                    </div>

                    <!-- Language name -->
                    <div class="font-bold text-white text-lg mb-1 group-hover:text-white/90 transition-colors">
                        {{ $language->name }}
                    </div>

                    <!-- Region -->
                    <div class="text-sm text-white/80 mb-2 group-hover:text-white/70 transition-colors">
                        {{ $language->region }}
                    </div>

                    <!-- Optional speaker count -->
                    @if(isset($language->speakers))
                    <div class="text-xs text-white/60 group-hover:text-white/50 transition-colors">
                        {{ number_format($language->speakers) }} speakers
                    </div>
                    @endif

                    <!-- Hover overlay -->
                    <div
                        class="absolute inset-0 bg-white/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                    </div>
                </a>
                @endforeach
            </div>

            <!-- No results message -->
            <div id="noResults" class="hidden text-center py-16">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-2xl font-bold text-white mb-2">No languages found</h3>
                <p class="text-gray-400">Try adjusting your search or filter criteria</p>
            </div>

            @else
            <!-- Empty state -->
            <div class="text-center py-16">
                <div class="text-6xl mb-6">🌍</div>
                <h3 class="text-2xl font-bold text-white mb-4">Languages Coming Soon</h3>
                <p class="text-gray-400 max-w-md mx-auto">
                    We're working hard to bring you comprehensive information about Kenya's diverse languages.
                </p>
            </div>
            @endif

            <!-- Stats -->
            @if($languages && $languages->count() > 0)
            <div class="mt-16 text-center">
                <p class="text-gray-400">
                    Discover <span class="text-white font-semibold">{{ $languages->count() }}</span> languages
                    across Kenya's diverse regions
                </p>
            </div>
            @endif
        </div>
    </section>


    <style>
        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .language-card {
            position: relative;
            overflow: hidden;
        }

        .language-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .language-card:hover::before {
            left: 100%;
        }
    </style>

    <script>
        // Search and filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('languageSearch');
            const regionFilter = document.getElementById('regionFilter');
            const languageCards = document.querySelectorAll('.language-card');
            const noResults = document.getElementById('noResults');
            const languagesGrid = document.getElementById('languagesGrid');

            function filterLanguages() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedRegion = regionFilter.value;
                let visibleCount = 0;

                languageCards.forEach(card => {
                    const languageName = card.dataset.languageName;
                    const region = card.dataset.region;
                    
                    const matchesSearch = languageName.includes(searchTerm);
                    const matchesRegion = !selectedRegion || region === selectedRegion;
                    
                    if (matchesSearch && matchesRegion) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show/hide no results message
                if (visibleCount === 0 && languageCards.length > 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            searchInput.addEventListener('input', filterLanguages);
            regionFilter.addEventListener('change', filterLanguages);
        });
  
    </script>

</x-layouts.app.guest>