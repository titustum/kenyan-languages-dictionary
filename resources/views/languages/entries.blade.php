<x-layouts.app.guest>
    <section class="min-h-screen mt-12 py-16 bg-gray-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Header and Back -->
            <div class="mb-10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <a href="{{ route('languages.show', $language->slug) }}"
                    class="text-blue-400 hover:underline text-sm flex items-center group">
                    <svg class="w-4 h-4 mr-1 transform transition-transform group-hover:-translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to {{ $language->name }}
                </a>

                <div class="text-center flex-1">
                    <div class="text-6xl mb-2">{{ $language->icon ?? '🌍' }}</div>
                    <h1 class="text-4xl md:text-5xl font-extrabold">{{ $language->name }} Dictionary</h1>
                    <p class="text-gray-400 mt-3 text-lg max-w-2xl mx-auto">
                        Explore community-contributed words with rich media, specific categories, and cultural context.
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
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($entries as $entry)
                        <div
                            class="bg-gray-800 rounded-xl p-5 shadow hover:shadow-lg transition duration-300 hover:scale-[1.02] border border-gray-700 hover:border-purple-600">
                            <div class="flex justify-between items-start mb-3">
                                <h2 class="text-2xl font-bold text-white">{{ ucfirst($entry->word) }}</h2>
                                @if($entry->category)
                                <span
                                    class="text-sm text-gray-400 flex items-center gap-1.5 bg-gray-700 px-3 py-1 rounded-full whitespace-nowrap">
                                    {{ $entry->category->icon ?? '📁' }} {{ $entry->category->name }}
                                </span>
                                @endif
                            </div>

                            <p class="text-purple-400 italic mb-3 text-lg">{{ $entry->translation_en }}</p>

                            @if($entry->image_path)
                            <img src="{{ asset('storage/' . $entry->image_path) }}" alt="Image for {{ $entry->word }}"
                                class="w-full h-48 object-cover rounded-md mb-3 border border-gray-700">
                            @endif

                            @if($entry->audio_path)
                            <div class="mb-3">
                                <audio controls class="w-full audio-player-custom">
                                    <source src="{{ asset('storage/' . $entry->audio_path) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            @endif

                            @if($entry->example_sentence)
                            <div class="text-base text-gray-300 italic mb-3 leading-relaxed">
                                “{{ $entry->example_sentence }}”
                            </div>
                            @endif

                            <div class="text-xs text-gray-500 mt-2">
                                Contributed by: <span class="font-semibold text-gray-400">{{ $entry->user->name ??
                                    'Unknown' }}</span>
                            </div>
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