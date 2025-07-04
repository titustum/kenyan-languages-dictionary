<x-layouts.app.guest title="Welcome!">

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

        /* Hero Section specific styles */
        .hero-pattern-dots {
            background-image: radial-gradient(circle, #D1D5DB 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .dark .hero-pattern-dots {
            background-image: radial-gradient(circle, #2d3748 1px, transparent 1px);
        }

        /* Feature card hover effect */
        .feature-card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .dark .feature-card-hover:hover {
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.05);
        }

        /* Button glow effect */
        .btn-glow {
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.5), 0 0 20px rgba(6, 182, 212, 0.3);
            transition: all 0.3s ease;
        }

        .btn-glow:hover {
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.7), 0 0 30px rgba(6, 182, 212, 0.5);
        }

        .language-card {
            transition: all 0.3s ease;
        }

        .language-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .word-card {
            transition: all 0.3s ease;
        }

        .word-card:hover {
            transform: scale(1.05);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }
    </style>
    @endpush



    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-400 to-blue-500 text-white py-16 px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-extrabold mb-4 animate-fade-in">
                Reclaim your mother tongue. One word at a time.
            </h1>
            <p class="mb-8 text-lg max-w-xl mx-auto opacity-90">
                Learn basic vocabulary in 10+ Kenyan languages through beautiful images and simple translations.
            </p>

            <!-- Language selector -->
            <label for="language-select" class="block mb-2 text-sm font-semibold">
                Choose your language to begin
            </label>
            <select id="language-select" name="language"
                class="mb-6 px-4 py-2 rounded bg-white text-black w-full max-w-xs mx-auto block focus:ring-2 focus:ring-white focus:outline-none"
                aria-label="Select language to learn">
                <option value="" disabled selected>Select a language</option>
                <option value="kikuyu">Kikuyu (Gĩkũyũ)</option>
                <option value="luo">Luo (Dholuo)</option>
                <option value="kiswahili">Kiswahili</option>
                <option value="kamba">Kamba (Kikamba)</option>
                <option value="luhya">Luhya (Luluhya)</option>
                <option value="maasai">Maasai (Maa)</option>
                <option value="meru">Meru (Kimeru)</option>
                <option value="kalenjin">Kalenjin</option>
                <option value="embu">Embu (Kĩembu)</option>
                <option value="taita">Taita (Kitaita)</option>
                <option value="turkana">Turkana (Ng'aturkana)</option>
                <option value="somali">Somali (Af-Soomaali)</option>
            </select>

            <!-- CTA Button -->
            <button onclick="handleLanguageSelection()"
                class="bg-white text-blue-600 font-bold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-100 hover:shadow-xl transition duration-300 transform hover:scale-105"
                aria-label="Start learning selected language">
                Start Learning Now
            </button>
        </div>
    </section>



    {{-- Language Exploration Section --}}
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
                    that weaves through Kenya's cultural heritage.
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

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div
                    class="text-center p-6 bg-white/70 dark:bg-black/5 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-white/10">
                    <div class="text-3xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">{{ $languages->count()
                        }}+</div>
                    <div class="text-gray-600 dark:text-gray-400 text-sm">Languages</div>
                </div>
                <div
                    class="text-center p-6 bg-white/70 dark:bg-black/5 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-white/10">
                    <div class="text-3xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">{{
                        number_format($total_words) }}+</div>
                    <div class="text-gray-600 dark:text-gray-400 text-sm">Words</div>
                </div>
                <div
                    class="text-center p-6 bg-white/70 dark:bg-black/5 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-white/10">
                    <div class="text-3xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">{{
                        number_format($total_audio_files) }}+</div>
                    <div class="text-gray-600 dark:text-gray-400 text-sm">Audio Files</div>
                </div>
                <div
                    class="text-center p-6 bg-white/70 dark:bg-black/5 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-white/10">
                    <div class="text-3xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">{{
                        number_format($total_contributors) }}+</div>
                    <div class="text-gray-600 dark:text-gray-400 text-sm">Contributors</div>
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


    {{-- Community Section --}}
    <section id="community"
        class="py-24 bg-white text-gray-900 relative overflow-hidden dark:bg-gradient-to-br dark:from-gray-900 dark:via-zinc-900 dark:to-black dark:text-white">
        <div
            class="absolute top-0 left-1/4 w-72 h-72 bg-teal-200/30 rounded-full blur-3xl animate-blob-1 dark:bg-teal-500/10">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-200/30 rounded-full blur-3xl animate-blob-2 dark:bg-blue-500/10">
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <div>
                        <div class="inline-flex items-center px-4 py-2 bg-teal-100 border border-teal-200 rounded-full text-teal-700 text-sm font-medium mb-6 animate-fade-in-down
                        dark:bg-teal-500/15 dark:border-teal-500/25 dark:text-teal-400">
                            <span
                                class="w-2.5 h-2.5 bg-teal-500 rounded-full mr-2 animate-pulse-slow dark:bg-teal-400"></span>
                            Community Driven
                        </div>
                        <h2 class="text-5xl md:text-6xl font-extrabold mb-8 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-900 bg-clip-text text-transparent leading-tight animate-fade-in-right
                        dark:from-white dark:via-teal-100 dark:to-blue-200">
                            Join Our Thriving Community
                        </h2>
                        <p class="text-lg text-gray-700 leading-relaxed animate-fade-in-up dark:text-gray-300">
                            Be part of preserving Kenya's rich linguistic heritage. Contribute words, audio recordings,
                            and
                            cultural context, and gain recognition as a valued member of our growing community.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 group animate-fade-in-up delay-100">
                            <div class="w-12 h-12 shrink-0 bg-teal-500 rounded-xl flex items-center justify-center shadow-lg shadow-teal-500/25 group-hover:scale-105 transition-transform duration-300 ease-in-out
                            dark:bg-gradient-to-r dark:from-teal-500 dark:to-teal-600">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-1 dark:text-white">Add New Words &
                                    Meanings</h3>
                                <p class="text-gray-600 dark:text-gray-400">Expand our dictionary with traditional and
                                    contemporary terms, enriched with example sentences.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group animate-fade-in-up delay-200">
                            <div class="w-12 h-12 shrink-0 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/25 group-hover:scale-105 transition-transform duration-300 ease-in-out
                            dark:bg-gradient-to-r dark:from-blue-500 dark:to-blue-600">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-1 dark:text-white">Contribute Audio
                                    Pronunciations</h3>
                                <p class="text-gray-600 dark:text-gray-400">Help others learn correct pronunciation with
                                    authentic native audio recordings.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group animate-fade-in-up delay-300">
                            <div class="w-12 h-12 shrink-0 bg-purple-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/25 group-hover:scale-105 transition-transform duration-300 ease-in-out
                            dark:bg-gradient-to-r dark:from-purple-500 dark:to-purple-600">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-1 dark:text-white">Share Cultural
                                    Context & Stories</h3>
                                <p class="text-gray-600 dark:text-gray-400">Preserve the rich cultural narratives and
                                    historical background behind each word.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group animate-fade-in-up delay-400">
                            <div class="w-12 h-12 shrink-0 bg-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/25 group-hover:scale-105 transition-transform duration-300 ease-in-out
                            dark:bg-gradient-to-r dark:from-orange-500 dark:to-amber-600">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-1 dark:text-white">Earn Recognition &
                                    Badges</h3>
                                <p class="text-gray-600 dark:text-gray-400">Build your reputation and showcase your
                                    expertise as a cultural preservation champion.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-8 animate-fade-in-up delay-500">
                        <a href="{{ route('register') }}" {{-- Link to registration for contributing --}}
                            class="px-8 py-4 bg-teal-600 text-white rounded-xl text-lg font-bold hover:bg-teal-700 transform hover:scale-105 transition-all duration-300 shadow-lg shadow-teal-500/30 text-center flex items-center justify-center
                        dark:bg-gradient-to-r dark:from-teal-500 dark:to-teal-600 dark:hover:from-teal-600 dark:hover:to-teal-700">
                            Start Contributing
                        </a>
                        <a href="/leaderboard" {{-- Assuming you'll have a leaderboard route --}}
                            class="px-8 py-4 border-2 border-gray-300 bg-white/50 text-gray-800 rounded-xl text-lg font-bold hover:bg-gray-100 hover:border-gray-400 transition-all duration-300 text-center flex items-center justify-center
                        dark:border-white/20 dark:backdrop-blur-sm dark:bg-white/10 dark:text-white dark:hover:bg-white/10 dark:hover:border-white/30">
                            View Contributors
                        </a>
                    </div>
                </div>

                <div class="relative animate-fade-in-left">
                    <div class="bg-gray-50 p-8 rounded-3xl shadow-lg border border-gray-200
                            dark:bg-white/5 dark:backdrop-blur-xl dark:border-white/10 dark:shadow-2xl">
                        <div class="text-center mb-8">
                            <h3 class="text-3xl font-bold text-gray-800 mb-2 dark:text-white">Top Community Contributors
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">Our dedicated heroes preserving Kenya's
                                invaluable languages.</p>
                        </div>

                        <div class="space-y-6">
                            {{-- These should ideally be dynamic from your controller. Example uses static for now. --}}
                            <div
                                class="relative p-6 bg-amber-500/10 rounded-2xl border border-amber-500/20 shadow-md transform hover:scale-105 transition-transform duration-300
                            dark:bg-gradient-to-r dark:from-amber-500/20 dark:via-orange-500/20 dark:to-red-500/20 dark:border-amber-500/30 dark:backdrop-blur-sm">
                                <div
                                    class="absolute top-0 left-0 w-full h-1 bg-amber-400 rounded-t-2xl dark:from-amber-400 dark:to-orange-500">
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div class="w-16 h-16 bg-amber-400 rounded-xl flex items-center justify-center font-extrabold text-2xl text-white shadow-lg
                                        dark:bg-gradient-to-r dark:from-amber-400 dark:to-orange-500">
                                            1
                                        </div>
                                        <div
                                            class="absolute -top-2 -right-2 text-3xl transform rotate-12 animate-bounce-slow">
                                            🏆</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-xl text-gray-800 dark:text-white">Grace Wanjiku</div>
                                        <div class="text-amber-600 font-medium text-lg dark:text-amber-300">2,847
                                            contributions</div>
                                        <div class="flex flex-wrap items-center space-x-2 mt-2">
                                            <div
                                                class="px-3 py-1 bg-amber-100 rounded-full text-xs text-amber-700 font-semibold dark:bg-amber-500/20 dark:text-amber-300">
                                                Legend</div>
                                            <div
                                                class="px-3 py-1 bg-teal-100 rounded-full text-xs text-teal-700 font-semibold dark:bg-teal-500/20 dark:text-teal-300">
                                                Audio Expert</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="relative p-5 bg-gray-100 rounded-2xl border border-gray-300 shadow-sm transform hover:scale-105 transition-transform duration-300
                            dark:bg-gradient-to-r dark:from-gray-400/20 dark:to-gray-500/20 dark:border-gray-400/30 dark:backdrop-blur-sm">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div class="w-14 h-14 bg-gray-400 rounded-lg flex items-center justify-center font-bold text-xl text-white shadow-lg
                                        dark:bg-gradient-to-r dark:from-gray-400 dark:to-gray-500">
                                            2
                                        </div>
                                        <div class="absolute -top-1 -right-1 text-2xl animate-fade-in">🥈</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-lg text-gray-800 dark:text-white">Samuel
                                            Kiprotich</div>
                                        <div class="text-gray-600 text-base dark:text-gray-300">1,923 contributions
                                        </div>
                                        <div class="flex flex-wrap items-center space-x-2 mt-1">
                                            <div
                                                class="px-3 py-1 bg-blue-100 rounded-full text-xs text-blue-700 font-semibold dark:bg-blue-500/20 dark:text-blue-300">
                                                Storyteller</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="relative p-5 bg-orange-500/10 rounded-2xl border border-orange-500/20 shadow-sm transform hover:scale-105 transition-transform duration-300
                            dark:bg-gradient-to-r dark:from-orange-500/20 dark:to-red-500/20 dark:border-orange-500/30 dark:backdrop-blur-sm">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div class="w-14 h-14 bg-orange-400 rounded-lg flex items-center justify-center font-bold text-xl text-white shadow-lg
                                        dark:bg-gradient-to-r dark:from-orange-400 dark:to-red-500">
                                            3
                                        </div>
                                        <div class="absolute -top-1 -right-1 text-2xl animate-fade-in">🥉</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-lg text-gray-800 dark:text-white">Amina Hassan
                                        </div>
                                        <div class="text-orange-600 text-base dark:text-gray-300">1,654 contributions
                                        </div>
                                        <div class="flex flex-wrap items-center space-x-2 mt-1">
                                            <div
                                                class="px-3 py-1 bg-purple-100 rounded-full text-xs text-purple-700 font-semibold dark:bg-purple-500/20 dark:text-purple-300">
                                                Cultural Keeper</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center pt-4 border-t border-gray-200 dark:border-white/10">
                                <p class="text-gray-600 text-sm mb-3 dark:text-gray-400">+{{ number_format(max(0,
                                    App\Models\User::count() - 3)) }} more community members</p> {{-- Ensure
                                non-negative count --}}
                                <a href="/leaderboard" class="inline-flex items-center text-teal-600 hover:text-teal-700 transition-colors duration-300 group
                                dark:text-teal-400 dark:hover:text-teal-300">
                                    <span class="font-medium">View Full Leaderboard</span>
                                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- New Section: Testimonials & Endorsements --}}
    {{-- New Section: Testimonials & Endorsements --}}
    <section
        class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-950 dark:to-slate-900 transition-colors duration-500 relative overflow-hidden">
        {{-- Subtle background shapes for visual interest --}}
        <div
            class="absolute -top-10 -left-10 w-48 h-48 bg-blue-300/20 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob-slow dark:bg-blue-600/10">
        </div>
        <div
            class="absolute -bottom-10 -right-10 w-64 h-64 bg-teal-300/20 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob-slow animation-delay-2000 dark:bg-teal-600/10">
        </div>

        <div class="max-w-7xl mx-auto px-4 lg:px-8 text-center relative z-10">
            <div class="inline-flex items-center px-4 py-2 bg-purple-100 border border-purple-200 rounded-full text-purple-700 text-sm font-medium mb-6 animate-fadeInUp
        dark:bg-purple-500/15 dark:border-purple-500/25 dark:text-purple-400">
                <span class="w-2.5 h-2.5 bg-purple-500 rounded-full mr-2 animate-pulse-slow dark:bg-purple-400"></span>
                Real Stories, Real Impact
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-12 animate-fadeInUp">
                What Our Community Says
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <blockquote
                    class="glass-card p-6 rounded-2xl shadow-xl text-left animate-fadeInUp delay-100 transform transition-transform hover:scale-[1.02] hover:shadow-2xl">
                    <p class="text-lg italic text-gray-700 dark:text-gray-300 mb-4 relative">
                        <span
                            class="absolute -top-4 -left-4 text-5xl font-serif text-teal-400 dark:text-teal-600 opacity-60">"</span>
                        The **visuals and audio** are a game-changer! I'm finally grasping Luo in a
                        way I never could with just textbooks.
                        <span
                            class="absolute -bottom-4 -right-4 text-5xl font-serif text-teal-400 dark:text-teal-600 opacity-60">"</span>
                    </p>
                    <div class="flex items-center mt-6">
                        <img src="https://api.dicebear.com/8.x/initials/svg?seed=AK&backgroundType=solid&backgroundColor=b0e0e6"
                            alt="Profile picture of Amina K., a language learner"
                            class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-teal-400 shadow-md">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Amina K.</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Language Learner, Nairobi</p>
                        </div>
                    </div>
                </blockquote>

                <blockquote
                    class="glass-card p-6 rounded-2xl shadow-xl text-left animate-fadeInUp delay-200 transform transition-transform hover:scale-[1.02] hover:shadow-2xl">
                    <p class="text-lg italic text-gray-700 dark:text-gray-300 mb-4 relative">
                        <span
                            class="absolute -top-4 -left-4 text-5xl font-serif text-blue-400 dark:text-blue-600 opacity-60">"</span>
                        As a linguist, I appreciate the dedication to **authentic pronunciation and cultural context**.
                        This is an invaluable resource.
                        <span
                            class="absolute -bottom-4 -right-4 text-5xl font-serif text-blue-400 dark:text-blue-600 opacity-60">"</span>
                    </p>
                    <div class="flex items-center mt-6">
                        <img src="https://api.dicebear.com/8.x/initials/svg?seed=JO&backgroundType=solid&backgroundColor=dda0dd"
                            alt="Profile picture of Dr. Juma O., a university researcher"
                            class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-blue-400 shadow-md">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Dr. Juma O.</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">University Researcher, Kenya</p>
                        </div>
                    </div>
                </blockquote>

                <blockquote
                    class="glass-card p-6 rounded-2xl shadow-xl text-left animate-fadeInUp delay-300 transform transition-transform hover:scale-[1.02] hover:shadow-2xl">
                    <p class="text-lg italic text-gray-700 dark:text-gray-300 mb-4 relative">
                        <span
                            class="absolute -top-4 -left-4 text-5xl font-serif text-emerald-400 dark:text-emerald-600 opacity-60">"</span>
                        Being able to **contribute and help grow** this dictionary feels incredible. It's a true
                        community effort for our heritage.
                        <span
                            class="absolute -bottom-4 -right-4 text-5xl font-serif text-emerald-400 dark:text-emerald-600 opacity-60">"</span>
                    </p>
                    <div class="flex items-center mt-6">
                        <img src="https://api.dicebear.com/8.x/initials/svg?seed=DM&backgroundType=solid&backgroundColor=f0e68c"
                            alt="Profile picture of David M., a top contributor"
                            class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-emerald-400 shadow-md">
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">David M.</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Top Contributor</p>
                        </div>
                    </div>
                </blockquote>
            </div>

            {{-- Small Call to Action for more testimonials or to submit one --}}
            <div class="mt-16 text-center animate-fadeInUp delay-400">
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    Inspired by these stories? Your voice matters!
                </p>
                <a href="{{ route('register') }}" {{-- Or a route to a dedicated "submit testimonial" page if available
                    --}}
                    class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-700 hover:from-purple-700 hover:to-indigo-800 text-white font-bold rounded-full shadow-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-500/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Share Your Experience
                </a>
            </div>
        </div>
    </section>

    {{-- Final Call to Action --}}
    <section class="py-20 bg-white dark:bg-gray-800 transition-colors duration-500">
        <div class="max-w-4xl mx-auto px-4 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-8 animate-fadeInUp">
                Ready to Discover Kenya's Linguistic Wonders?
            </h2>
            <p class="text-xl md:text-2xl text-gray-700 dark:text-gray-300 mb-10 animate-fadeInUp delay-100">
                Start your journey of cultural immersion and language mastery today.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fadeInUp delay-200">
                <a href="#languages" {{-- Scroll to the languages section --}}
                    class="inline-flex items-center justify-center px-10 py-5 bg-gradient-to-r from-teal-500 to-blue-600 hover:from-teal-600 hover:to-blue-700 text-white font-bold rounded-full shadow-lg transition-all duration-300 transform hover:scale-105 btn-glow focus:outline-none focus:ring-4 focus:ring-teal-500/50">
                    <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    Explore All Languages
                </a>

                {{-- Placeholder for future mobile app download --}}
                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6 sm:mt-0">
                    <a href="#"
                        class="inline-flex items-center justify-center px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full shadow-md transition-all duration-300 hover:scale-105 opacity-50 cursor-not-allowed">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg"
                            alt="Download on the App Store" class="h-8 mr-2">
                        Coming Soon on iOS
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full shadow-md transition-all duration-300 hover:scale-105 opacity-50 cursor-not-allowed">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
                            alt="Get it on Google Play" class="h-8 mr-2">
                        Coming Soon on Android
                    </a>
                </div>
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
                target.classList.remove('bg-white/70', 'border-gray-300', 'text-gray-700', 'hover:bg-gray-200', 'dark:bg-black/10', 'dark:border-white/20', 'dark:text-gray-300', 'dark:hover:bg-black/20');


                currentRegionFilter = target.dataset.regionSlug;
                filterLanguages();
            });

            // Function to reset filters (called by the "No Languages Found" button)
            window.resetFilters = () => {
                searchInput.value = ''; // Clear search input
                document.querySelector('.filter-tag[data-region-slug="all"]').click(); // Click "All Regions" tag
            };

            // Initial filter on page load (important for consistent state)
            filterLanguages();
        });
    </script>
    @endpush

</x-layouts.app.guest>