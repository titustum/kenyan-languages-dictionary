<x-layouts.app.guest>

    <section class="min-h-screen mt-12 py-16 bg-gray-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Header and Back -->
            <div class="mb-10 flex flex-col lg:flex-row justify-between items-start gap-4">
                <a href="{{ route('languages.show', $language->slug) }}" class="text-blue-400 hover:underline text-sm">
                    ← Back to {{ $language->name }}
                </a>

                <div class="text-center lg:text-right flex-1">
                    <div class="text-4xl">{{ $language->icon ?? '🌍' }}</div>
                    <h1 class="text-3xl font-bold mt-1">{{ $language->name }} Dictionary</h1>
                    <p class="text-gray-400 mt-2">
                        Explore community-contributed words with media, categories, and context.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <!-- Sidebar: Categories -->
                <aside class="lg:col-span-1">
                    <h2 class="text-lg font-semibold mb-4">Categories</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('languages.entries', $language->slug) }}"
                                class="block text-sm hover:text-blue-400 {{ request()->get('category') ? '' : 'text-blue-400 font-bold' }}">
                                All Categories
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('languages.entries', [$language->slug, 'category' => $category->slug]) }}"
                                class="flex items-center text-sm gap-2 hover:text-blue-400 {{ request()->get('category') === $category->slug ? 'text-blue-400 font-bold' : '' }}">
                                <span>{{ $category->icon ?? '📁' }}</span>
                                <span>{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </aside>

                <!-- Main Content -->
                <main class="lg:col-span-4 space-y-8">

                    <!-- Search -->
                    <div class="mb-4">
                        <form method="GET" action="{{ route('languages.entries', $language->slug) }}">
                            <input type="text" name="search" value="{{ request()->get('search') }}"
                                placeholder="Search word..."
                                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @if(request()->get('category'))
                            <input type="hidden" name="category" value="{{ request()->get('category') }}">
                            @endif
                        </form>
                    </div>

                    <!-- Entries -->
                    @if($entries->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($entries as $entry)
                        <div class="bg-gray-800 rounded-xl p-5 shadow hover:shadow-lg transition">
                            <div class="flex justify-between items-center mb-2">
                                <h2 class="text-xl font-semibold">{{ $entry->word }}</h2>
                                @if($entry->category)
                                <span class="text-sm text-gray-400 flex items-center gap-1">
                                    {{ $entry->category->icon ?? '📁' }} {{ $entry->category->name }}
                                </span>
                                @endif
                            </div>

                            <p class="text-blue-400 italic mb-2">{{ $entry->translation_en }}</p>

                            @if($entry->image_path)
                            <img src="{{ asset('storage/' . $entry->image_path) }}" alt="{{ $entry->word }}"
                                class="w-full h-40 object-cover rounded mb-3">
                            @endif

                            @if($entry->audio_path)
                            <audio controls class="w-full mb-3">
                                <source src="{{ asset('storage/' . $entry->audio_path) }}" type="audio/mpeg">
                                Your browser does not support audio.
                            </audio>
                            @endif

                            @if($entry->example_sentence)
                            <div class="text-sm text-gray-300 italic mb-3">
                                “{{ $entry->example_sentence }}”
                            </div>
                            @endif

                            <div class="text-xs text-gray-500">
                                Contributed by: {{ $entry->user->name ?? 'Unknown' }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <!-- Empty State -->
                    <div class="text-center py-20 col-span-4">
                        <div class="text-6xl mb-4">📭</div>
                        <h3 class="text-2xl font-bold mb-2">No entries found</h3>
                        <p class="text-gray-400">Try a different category or search term.</p>
                    </div>
                    @endif

                </main>
            </div>
        </div>
    </section>

</x-layouts.app.guest>