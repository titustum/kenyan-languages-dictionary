<x-layouts.app.guest>

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

    <section class="min-h-screen mt-12 py-16 bg-gray-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Header and Back -->
            <div class="mb-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">

                <div class="text-center flex-1">
                    <div class="text-6xl mb-2">{{ $language->icon ?? '🌍' }}</div>
                    <h1 class="text-4xl md:text-5xl font-extrabold">Explore {{ $language->name }} Language</h1>
                    <p class="text-gray-400 mt-3 text-lg max-w-2xl mx-auto">
                        {{ $language->description }}
                    </p>
                </div>

                {{-- Spacer for right alignment on large screens if back button is on left --}}
                <div class="hidden lg:block w-48"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <!-- Sidebar: Categories -->
                <aside class="lg:col-span-1 bg-gray-800 p-6 rounded-xl shadow-md">
                    <h2 class="text-2xl font-bold mb-6 text-white">Categories</h2>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('languages.entries', $language->slug) }}"
                                class="block p-3 rounded-lg text-base transition duration-200
                                       {{ request()->get('category') ? 'text-gray-300 hover:bg-gray-700' : 'bg-purple-600 text-white font-bold shadow-md' }}">
                                All Categories
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('languages.entries', [$language->slug, 'category' => $category->slug]) }}"
                                class="flex items-center text-base gap-3 p-3 rounded-lg transition duration-200
                                       {{ request()->get('category') === $category->slug ? 'bg-purple-600 text-white font-bold shadow-md' : 'text-gray-300 hover:bg-gray-700' }}">
                                <span>{{ $category->icon ?? '📁' }}</span>
                                <span>{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </aside>

                <!-- Main Content -->
                <main class="lg:col-span-4 space-y-8">

                    <!-- Search Input -->
                    <div class="mb-4">
                        <form method="GET" action="{{ route('languages.entries', $language->slug) }}" class="relative">
                            <input type="text" name="search" value="{{ request()->get('search') }}"
                                placeholder="Search words, translations, or examples..."
                                class="w-full bg-gray-800 border border-gray-700 rounded-lg pl-12 pr-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            @if(request()->get('category'))
                            <input type="hidden" name="category" value="{{ request()->get('category') }}">
                            @endif
                        </form>
                    </div>

                    <!-- Entries Grid -->
                    @if($entries->count())
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach ($entries as $entry)
                        <div
                            class="bg-white/5 rounded-xl p-4 border border-white/10 hover:border-emerald-500 transition-all space-y-3">
                            {{-- Image at the top --}}
                            @if($entry->image_path)
                            <img src="{{ asset('storage/' . $entry->image_path) }}" alt="{{ $entry->word }}"
                                class="w-full h-40 object-contain p-3 rounded-lg">
                            @endif

                            {{-- Word + Category --}}
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold text-white">{{ $entry->word }}</h3>
                                {{-- <span class="text-sm text-gray-400">{{ $entry->category->icon ?? '📁' }} {{
                                    $entry->category->name }}</span> --}}
                            </div>

                            {{-- Translation --}}
                            <p class="text-emerald-400 text-lg">{{ $entry->translation_en }}</p>

                            {{-- Example Sentence --}}
                            @if($entry->example_sentence)
                            <p class="text-sm text-gray-400 italic">“{{ $entry->example_sentence }}”</p>
                            @endif

                            {{-- Audio --}}
                            @if($entry->audio_path)
                            <audio controls class="w-full mt-2">
                                <source src="{{ asset('storage/' . $entry->audio_path) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            @endif
                        </div>
                        @endforeach

                    </div>

                    <!-- Pagination -->
                    @if ($entries->hasPages())
                    <div class="mt-8">
                        {{ $entries->links('pagination::tailwind') }} {{-- Assumes you have a TailwindCSS pagination
                        view --}}
                    </div>
                    @endif

                    @else
                    <!-- Empty State -->
                    <div class="text-center py-20 lg:col-span-4 bg-gray-800 rounded-xl shadow-md">
                        <div class="text-6xl mb-4">📭</div>
                        <h3 class="text-2xl font-bold mb-2">No entries found</h3>
                        <p class="text-gray-400">Try a different category or search term.</p>
                        <a href="{{ route('languages.entries', $language->slug) }}"
                            class="mt-6 inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-5 rounded-full transition duration-200">
                            Reset Filters
                        </a>
                    </div>
                    @endif

                </main>
            </div>
        </div>
    </section>


    @push('styles')
    <style>
        /* Custom styling for audio player track and thumb for consistency */
        audio::-webkit-media-controls-panel {
            background-color: #374151;
            /* gray-700 */
            color: #D1D5DB;
            /* gray-300 */
            border-radius: 0.5rem;
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
    </style>
    @endpush
</x-layouts.app.guest>