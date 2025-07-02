{{-- resources/views/view-language.blade.php --}}

<x-layouts.app.guest :title="$page_title">

    @push('styles')
    <style>
        /* Specific styles for this about page */
        .language-header-bg {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.7) grayscale(0.2);
            /* Slightly dim and desaturate image */
        }

        .dark .language-header-bg {
            filter: brightness(0.5) grayscale(0.5);
            /* Even more muted in dark mode */
        }
    </style>
    @endpush

    <div class="relative min-h-[50vh] flex items-end pb-12 transition-colors duration-500" @if($language->image_path)
        style="background-image: url('{{ asset('storage/' . $language->image_path) }}');"
        class="language-header-bg from-blue-900 via-blue-800 to-indigo-900 bg-gradient-to-t"
        @else
        class="bg-gradient-to-br from-blue-700 to-indigo-800 dark:from-gray-900 dark:to-slate-900"
        @endif
        >
        <div class="absolute inset-0 bg-black opacity-30 dark:opacity-60"></div> {{-- Overlay for text readability --}}
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div> {{-- Gradient fade to bottom
        --}}

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-white w-full">
            <div class="flex items-center space-x-6">
                @if($language->icon)
                <div class="text-7xl md:text-8xl p-4 bg-white/20 backdrop-blur-sm rounded-3xl shadow-xl flex-shrink-0">
                    {{ $language->icon }}
                </div>
                @endif
                <div>
                    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight drop-shadow-lg mb-2">
                        {{ $language->name }}
                    </h1>
                    <p class="text-xl md:text-2xl font-light opacity-90 drop-shadow-md">
                        A language from the {{ $language->region ?? 'Unknown Region' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 md:py-20 bg-white dark:bg-gray-900 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Main Content Column --}}
            <div class="lg:col-span-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">About {{ $language->name
                    }}</h2>
                <div
                    class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed text-lg">
                    @if($language->description)
                    {{-- Use Markdown::parse if you expect Markdown in description, otherwise nl2br for simple line
                    breaks --}}
                    {!! $language->description !!}
                    @else
                    <p>No detailed description is available for {{ $language->name }} yet. If you have information to
                        share, consider becoming a contributor!</p>
                    @endif
                </div>

                {{-- Add more sections here if needed, e.g., History, Cultural Significance --}}
                <div
                    class="mt-12 p-8 bg-gray-50 dark:bg-gray-800 rounded-xl shadow-inner border border-gray-200 dark:border-gray-700">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Quick Facts</h3>
                    <ul class="text-gray-700 dark:text-gray-300 space-y-3">
                        <li><strong>Region:</strong> {{ $language->region ?? 'N/A' }}</li>
                        <li><strong>Estimated Speakers:</strong> {{ $language->speakers ?
                            number_format($language->speakers) : 'N/A' }}</li>
                        <li><strong>Added On:</strong> {{ $language->created_at->format('M d, Y') }}</li>
                        {{-- Add more facts as needed, e.g., dialects, related languages --}}
                    </ul>
                </div>
            </div>

            {{-- Sidebar / Call to Action --}}
            <div class="lg:col-span-1 space-y-8">
                {{-- Related Actions Card --}}
                <div
                    class="p-8 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-gray-800 dark:to-slate-800 rounded-xl shadow-lg border border-blue-200 dark:border-slate-700 text-center">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Explore Further</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-6">Dive deeper into {{ $language->name }} or
                        contribute to its growth.</p>
                    <div class="flex flex-col gap-4">
                        {{-- Assuming a 'languages.entries' route still exists for words related to a language --}}
                        <a href="{{ route('languages.entries', $language->slug) }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-teal-600 text-white font-semibold rounded-full shadow-md hover:bg-teal-700 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            View All Words
                        </a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-300 text-gray-800 font-semibold rounded-full shadow-md hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Become a Contributor
                        </a>
                    </div>
                </div>

                {{-- Image Card (if not used in header or for secondary image) --}}
                @if($language->image_path)
                <div
                    class="bg-gray-50 dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 text-center">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Visual Representation</h3>
                    <img src="{{ asset('storage/' . $language->image_path) }}"
                        alt="{{ $language->name }} cultural image" class="w-full h-auto rounded-lg mb-4 shadow-md">
                    <p class="text-sm text-gray-600 dark:text-gray-400">An insight into the culture and people
                        associated with {{ $language->name }}.</p>
                </div>
                @endif
            </div>
        </div>
    </section>

</x-layouts.app.guest>