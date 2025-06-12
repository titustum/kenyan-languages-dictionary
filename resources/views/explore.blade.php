<x-layouts.app.guest>
    <section id="dictionary-content" class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Explore Dictionary Entries</h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    Dive into the visual and auditory world of Kenyan languages.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @foreach ($entries as $entry)
                <div
                    class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">

                    {{-- Image --}}
                    <img src="{{ $entry->image_path ? asset('storage/' . $entry->image_path) : 'https://placehold.co/600x400/1f2937/d1d5db?text=' . urlencode($entry->category ?? 'Word') }}"
                        alt="{{ $entry->word }}" class="w-full h-48 object-cover">

                    <div class="p-6">
                        {{-- Word and Translation --}}
                        <h3 class="text-2xl font-bold text-white mb-2">{{ ucfirst($entry->word) }}</h3>
                        <p class="text-sm text-gray-400 mb-4">
                            {{ $entry->language->name ?? 'Unknown Language' }} - "{{ $entry->translation_en }}"
                        </p>

                        {{-- Example Sentence --}}
                        @if($entry->example_sentence)
                        <p class="text-gray-300 text-base mb-4">{{ $entry->example_sentence }}</p>
                        @endif

                        {{-- Audio Button --}}
                        <div class="flex items-center justify-between">
                            @if($entry->audio_path)
                            <button
                                class="bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 transition duration-200"
                                onclick="playAudio('{{ asset('storage/' . $entry->audio_path) }}')">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <span class="text-sm text-gray-500">Listen</span>
                            @else
                            <span class="text-sm text-gray-500 italic">No audio</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
        <script>
            function playAudio(audioUrl) {
            const audio = new Audio(audioUrl);
            audio.play().catch(e => console.error("Error playing audio:", e));
        }
        </script>
    </section>

</x-layouts.app.guest>