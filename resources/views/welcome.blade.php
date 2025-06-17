<x-layouts.app.guest>

    <!-- Languages Showcase -->
    <section id="languages"
        class="py-24 bg-gradient-to-br from-gray-900 via-slate-900 to-gray-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 20px 20px;">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
            <!-- Header Section -->
            <div class="text-center mb-20">
                <div
                    class="inline-flex items-center px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full text-emerald-400 text-sm font-medium mb-6">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full mr-2 animate-pulse"></span>
                    Linguistic Diversity
                </div>
                <h2
                    class="text-5xl md:text-6xl font-bold mb-8 bg-gradient-to-r from-white via-blue-100 to-emerald-200 bg-clip-text text-transparent">
                    Explore Kenya's Languages
                </h2>
                <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed">
                    From the highlands of Kikuyu to the pastoral lands of Turkana, discover the rich linguistic tapestry
                    that weaves through Kenya's cultural heritage
                </p>

                <!-- Search Bar -->
                <div class="max-w-md mx-auto mt-10">
                    <div class="relative">
                        <input type="text" placeholder="Search languages..."
                            class="w-full px-6 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500/50 transition-all">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Language Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10">
                    <div class="text-3xl font-bold text-emerald-400 mb-2">42+</div>
                    <div class="text-gray-400 text-sm">Languages</div>
                </div>
                <div class="text-center p-6 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10">
                    <div class="text-3xl font-bold text-blue-400 mb-2">15K+</div>
                    <div class="text-gray-400 text-sm">Words</div>
                </div>
                <div class="text-center p-6 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10">
                    <div class="text-3xl font-bold text-purple-400 mb-2">8K+</div>
                    <div class="text-gray-400 text-sm">Audio Files</div>
                </div>
                <div class="text-center p-6 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10">
                    <div class="text-3xl font-bold text-orange-400 mb-2">1.2K+</div>
                    <div class="text-gray-400 text-sm">Contributors</div>
                </div>
            </div>

            <!-- Enhanced Language Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
                @php
                $enhancedColors = [
                'red' => 'from-red-500 to-red-600 shadow-red-500/25',
                'yellow' => 'from-yellow-400 to-yellow-500 shadow-yellow-500/25 text-gray-900',
                'green' => 'from-green-500 to-green-600 shadow-green-500/25',
                'blue' => 'from-blue-500 to-blue-600 shadow-blue-500/25',
                'indigo' => 'from-indigo-500 to-indigo-600 shadow-indigo-500/25',
                'purple' => 'from-purple-500 to-purple-600 shadow-purple-500/25',
                'pink' => 'from-pink-500 to-pink-600 shadow-pink-500/25',
                'orange' => 'from-orange-500 to-orange-600 shadow-orange-500/25',
                'teal' => 'from-teal-500 to-teal-600 shadow-teal-500/25',
                'cyan' => 'from-cyan-500 to-cyan-600 shadow-cyan-500/25',
                'amber' => 'from-amber-400 to-amber-500 shadow-amber-500/25 text-gray-900',
                'lime' => 'from-lime-400 to-lime-500 shadow-lime-500/25 text-gray-900',
                'gray' => 'from-gray-500 to-gray-600 shadow-gray-500/25',
                'rose' => 'from-rose-500 to-rose-600 shadow-rose-500/25',
                'brown' => 'from-yellow-800 to-yellow-900 shadow-yellow-800/25',
                ];
                @endphp

                @foreach ($languages as $language)
                <a href="{{ route('languages.entries', $language) }}"
                    class="language-card group relative bg-gradient-to-br {{ $enhancedColors[$language->color] }} rounded-2xl p-6 text-center cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-white/10 backdrop-blur-sm"
                    role="button" tabindex="0"
                    aria-label="Explore {{ $language->name }} language from {{ $language->region }}">

                    <!-- Hover Glow Effect -->
                    <div
                        class="absolute inset-0 rounded-2xl bg-gradient-to-br {{ str_replace('shadow-', 'from-', explode(' ', $enhancedColors[$language->color])[2]) }}/0 group-hover:{{ str_replace('shadow-', 'from-', explode(' ', $enhancedColors[$language->color])[2]) }}/20 transition-all duration-300">
                    </div>

                    <!-- Content -->
                    <div class="relative z-10">
                        <div class="text-4xl mb-4 transform group-hover:scale-110 transition-transform duration-300">
                            {{ $language->icon ?? '🗣️' }}
                        </div>
                        <div class="font-bold text-lg mb-2">{{ $language->name }}</div>
                        <div class="text-sm opacity-90 mb-3">{{ $language->region }}</div>

                        <!-- Language Stats -->
                        <div class="text-xs opacity-75 flex justify-center items-center space-x-2">
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $language->words_count ?? rand(150, 800) }}
                            </span>
                            <span>•</span>
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.369 4.369 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z">
                                    </path>
                                </svg>
                                {{ $language->audio_count ?? rand(50, 300) }}
                            </span>
                        </div>

                        <!-- Arrow Icon -->
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </a>
                @endforeach



                <!-- Enhanced "More Languages" Card -->
                <a href="/languages"
                    class="language-card group relative bg-gradient-to-br from-slate-700 via-slate-600 to-slate-500 rounded-2xl p-6 text-center cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-2xl border border-white/20 backdrop-blur-sm overflow-hidden"
                    role="button" tabindex="0" aria-label="View all {{ $remainingLanguagesCount }} remaining languages">

                    <!-- Animated Background -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-indigo-500/20 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <!-- Content -->
                    <div class="relative z-10">
                        <div class="text-4xl mb-4 transform group-hover:rotate-12 transition-transform duration-300">⭐
                        </div>
                        <div class="font-bold text-lg mb-2 text-white">+{{ $remainingLanguagesCount }} More</div>
                        <div class="text-sm opacity-90 text-gray-300 mb-3">Discover All Languages</div>
                        <div class="text-xs text-gray-400">Click to explore →</div>
                    </div>
                </a>
            </div>

            <!-- Filter Tags -->
            <div class="mt-12 flex flex-wrap justify-center gap-3">
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    All Regions
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Nyanza Kenya
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Western Kenya
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Rift Valley Kenya
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Central Kenya
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Coast Region
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Northern Kenya
                </button>
                <button
                    class="px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm text-gray-300 hover:bg-white/20 hover:text-white transition-all duration-300">
                    Eastern Kenya
                </button>
            </div>
        </div>
    </section>

    <!-- Enhanced Community Section -->
    <section id="community"
        class="py-24 bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-1/4 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <!-- Left Column - Content -->
                <div class="space-y-8">
                    <div>
                        <div
                            class="inline-flex items-center px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full text-emerald-400 text-sm font-medium mb-6">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full mr-2 animate-pulse"></span>
                            Community Driven
                        </div>
                        <h2
                            class="text-5xl md:text-6xl font-bold mb-8 bg-gradient-to-r from-white via-blue-100 to-emerald-200 bg-clip-text text-transparent">
                            Join Our Community
                        </h2>
                        <p class="text-xl text-gray-300 leading-relaxed">
                            Be part of preserving Kenya's linguistic heritage. Contribute words, audio recordings, and
                            cultural context while earning recognition as a valued community member.
                        </p>
                    </div>

                    <!-- Enhanced Feature List -->
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 group">
                            <div
                                class="w-12 h-12 shrink-0 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/25 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-2">Add New Words & Meanings</h3>
                                <p class="text-gray-400">Expand our dictionary with traditional and contemporary terms
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group">
                            <div
                                class="w-12 h-12 shrink-0 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/25 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-2">Contribute Audio Pronunciations</h3>
                                <p class="text-gray-400">Help others learn correct pronunciation with native audio</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group">
                            <div
                                class="w-12 h-12 shrink-0 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/25 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-2">Share Cultural Context & Stories</h3>
                                <p class="text-gray-400">Preserve the rich cultural narratives behind each word</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 group">
                            <div
                                class="w-12 h-12 shrink-0 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg shadow-orange-500/25 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-2">Earn Recognition & Badges</h3>
                                <p class="text-gray-400">Build your reputation as a cultural preservation champion</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-8">
                        <a href="/contribute"
                            class="px-8 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-2xl text-lg font-bold hover:from-emerald-600 hover:to-emerald-700 transform hover:scale-105 transition-all duration-300 shadow-lg shadow-emerald-500/25 text-center">
                            Start Contributing
                        </a>
                        <a href="/contributors"
                            class="px-8 py-4 border-2 border-white/20 backdrop-blur-sm rounded-2xl text-lg font-bold text-white hover:bg-white/10 hover:border-white/30 transition-all duration-300 text-center">
                            View Contributors
                        </a>
                    </div>
                </div>

                <!-- Right Column - Enhanced Leaderboard -->
                <div class="relative">
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl">
                        <div class="text-center mb-8">
                            <h3 class="text-3xl font-bold text-white mb-2">Top Contributors</h3>
                            <p class="text-gray-400">Community heroes preserving our languages</p>
                        </div>

                        <div class="space-y-4">
                            <!-- First Place -->
                            <div
                                class="relative p-6 bg-gradient-to-r from-yellow-500/20 via-orange-500/20 to-red-500/20 rounded-2xl border border-yellow-500/30 backdrop-blur-sm">
                                <div
                                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-t-2xl">
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div
                                            class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center font-bold text-xl text-white shadow-lg">
                                            1
                                        </div>
                                        <div class="absolute -top-2 -right-2 text-2xl">🏆</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-lg text-white">Grace Wanjiku</div>
                                        <div class="text-yellow-300 font-medium">2,847 contributions</div>
                                        <div class="flex items-center space-x-2 mt-2">
                                            <div
                                                class="px-2 py-1 bg-yellow-500/20 rounded-full text-xs text-yellow-300">
                                                Legend</div>
                                            <div
                                                class="px-2 py-1 bg-emerald-500/20 rounded-full text-xs text-emerald-300">
                                                Audio Expert</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Place -->
                            <div
                                class="relative p-5 bg-gradient-to-r from-gray-400/20 to-gray-500/20 rounded-2xl border border-gray-400/30 backdrop-blur-sm">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div
                                            class="w-14 h-14 bg-gradient-to-r from-gray-400 to-gray-500 rounded-xl flex items-center justify-center font-bold text-lg text-white shadow-lg">
                                            2
                                        </div>
                                        <div class="absolute -top-1 -right-1 text-xl">🥈</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-white">Samuel Kiprotich</div>
                                        <div class="text-gray-300 text-sm">1,923 contributions</div>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <div class="px-2 py-1 bg-blue-500/20 rounded-full text-xs text-blue-300">
                                                Storyteller</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Third Place -->
                            <div
                                class="relative p-5 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-2xl border border-orange-500/30 backdrop-blur-sm">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <div
                                            class="w-14 h-14 bg-gradient-to-r from-orange-400 to-red-500 rounded-xl flex items-center justify-center font-bold text-lg text-white shadow-lg">
                                            3
                                        </div>
                                        <div class="absolute -top-1 -right-1 text-xl">🥉</div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-white">Amina Hassan</div>
                                        <div class="text-gray-300 text-sm">1,654 contributions</div>
                                        <div class="flex items-center space-x-2 mt-1">
                                            <div
                                                class="px-2 py-1 bg-purple-500/20 rounded-full text-xs text-purple-300">
                                                Cultural Keeper</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- More contributors preview -->
                            <div class="text-center pt-4 border-t border-white/10">
                                <p class="text-gray-400 text-sm mb-3">+1,247 more contributors</p>
                                <a href="/leaderboard"
                                    class="inline-flex items-center text-emerald-400 hover:text-emerald-300 transition-colors duration-300">
                                    <span>View Full Leaderboard</span>
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

</x-layouts.app.guest>