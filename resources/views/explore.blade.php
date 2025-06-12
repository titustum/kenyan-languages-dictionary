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
                <!-- Dictionary Entry Card 1: Jambo (Swahili) -->
                <div
                    class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="https://placehold.co/600x400/1f2937/d1d5db?text=Greetings" alt="People greeting"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Jambo</h3>
                        <p class="text-sm text-gray-400 mb-4">Swahili - "Hello"</p>
                        <p class="text-gray-300 text-base mb-4">A common greeting used across Kenya, meaning "Hello" or
                            "How are you?".</p>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 transition duration-200"
                                onclick="playAudio('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3')">
                                <!-- Placeholder Audio URL -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <span class="text-sm text-gray-500">Listen</span>
                        </div>
                    </div>
                </div>

                <!-- Dictionary Entry Card 2: Asante (Swahili) -->
                <div
                    class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="https://placehold.co/600x400/1f2937/d1d5db?text=Thank+You" alt="Handshake"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Asante</h3>
                        <p class="text-sm text-gray-400 mb-4">Swahili - "Thank you"</p>
                        <p class="text-gray-300 text-base mb-4">A polite expression of gratitude, widely understood and
                            appreciated.</p>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 transition duration-200"
                                onclick="playAudio('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3')">
                                <!-- Placeholder Audio URL -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <span class="text-sm text-gray-500">Listen</span>
                        </div>
                    </div>
                </div>

                <!-- Dictionary Entry Card 3: Habari (Swahili) -->
                <div
                    class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="https://placehold.co/600x400/1f2937/d1d5db?text=News" alt="Person reading news"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Habari</h3>
                        <p class="text-sm text-gray-400 mb-4">Swahili - "News/How are you?"</p>
                        <p class="text-gray-300 text-base mb-4">Translates to "news" but commonly used as a greeting
                            asking "How are you?".</p>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 transition duration-200"
                                onclick="playAudio('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3')">
                                <!-- Placeholder Audio URL -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <span class="text-sm text-gray-500">Listen</span>
                        </div>
                    </div>
                </div>

                <!-- Dictionary Entry Card 4: Nyumba (Gikuyu) -->
                <div
                    class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="https://placehold.co/600x400/1f2937/d1d5db?text=House" alt="Traditional house"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Nyumba</h3>
                        <p class="text-sm text-gray-400 mb-4">Gikuyu - "House"</p>
                        <p class="text-gray-300 text-base mb-4">A dwelling place, central to family life in Kikuyu
                            culture.</p>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-purple-600 text-white p-2 rounded-full hover:bg-purple-700 transition duration-200"
                                onclick="playAudio('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3')">
                                <!-- Placeholder Audio URL -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <span class="text-sm text-gray-500">Listen</span>
                        </div>
                    </div>
                </div>

                <!-- Add more dictionary entries as needed, following the same structure -->

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