<x-layouts.app.guest>

    @php
    $enhancedColors = [
    'red' => 'from-red-500 to-red-600 shadow-lg shadow-red-500/30',
    'yellow' => 'from-yellow-400 to-yellow-500 shadow-lg shadow-yellow-500/30 text-gray-900',
    'green' => 'from-green-500 to-green-600 shadow-lg shadow-green-500/30',
    'blue' => 'from-blue-500 to-blue-600 shadow-lg shadow-blue-500/30',
    'indigo' => 'from-indigo-500 to-indigo-600 shadow-lg shadow-indigo-500/30',
    'purple' => 'from-purple-500 to-purple-600 shadow-lg shadow-purple-500/30',
    'pink' => 'from-pink-500 to-pink-600 shadow-lg shadow-pink-500/30',
    'orange' => 'from-orange-500 to-orange-600 shadow-lg shadow-orange-500/30',
    'teal' => 'from-teal-500 to-teal-600 shadow-lg shadow-teal-500/30',
    'cyan' => 'from-cyan-500 to-cyan-600 shadow-lg shadow-cyan-500/30',
    'amber' => 'from-amber-400 to-amber-500 shadow-lg shadow-amber-500/30 text-gray-900',
    'lime' => 'from-lime-400 to-lime-500 shadow-lg shadow-lime-500/30 text-gray-900',
    'gray' => 'from-gray-500 to-gray-600 shadow-lg shadow-gray-500/30',
    'rose' => 'from-rose-500 to-rose-600 shadow-lg shadow-rose-500/30',
    'brown' => 'from-yellow-800 to-yellow-900 shadow-lg shadow-yellow-800/30',
    ];
    @endphp

    <section
        class="min-h-screen py-16 md:py-24 bg-gray-950 text-white relative overflow-hidden flex items-center justify-center">

        <div class="absolute inset-0 z-0 opacity-10"
            style="background-image: radial-gradient(#2d3748 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="max-w-6xl mx-auto px-6 lg:px-8 relative z-10 w-full">

            <div class="text-center mb-12 md:mb-16">
                <div class="text-7xl mb-4 animate-fade-in-up">
                    {{ $language->icon ?? '🗣️' }}
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold mb-3 leading-tight animate-fade-in-up delay-100">{{
                    $language->name }}</h1>
                <p class="text-gray-300 text-lg md:text-xl animate-fade-in-up delay-200">{{ $language->region }}</p>
            </div>

            <div
                class="bg-gradient-to-br {{ $enhancedColors[$language->color] ?? 'from-gray-700 to-gray-800 shadow-lg shadow-gray-700/30' }} rounded-3xl p-8 md:p-12 shadow-2xl text-white relative overflow-hidden transform transition-all duration-500 hover:scale-[1.01] hover:shadow-3xl animate-scale-in">

                @if($language->image_path)
                <div
                    class="mb-8 rounded-2xl overflow-hidden shadow-xl transform translate-y-0 opacity-100 transition-transform duration-700 ease-out animate-fade-in-up delay-300">
                    <img src="{{ asset('storage/' . $language->image_path) }}"
                        alt="{{ $language->name }} representative image"
                        class="w-full h-72 md:h-96 object-cover object-center transition-transform duration-500 ease-in-out hover:scale-105">
                </div>
                @endif

                <h2 class="text-3xl md:text-4xl font-bold mb-5 text-shadow-sm animate-fade-in-up delay-400">About {{
                    $language->name }}</h2>
                <p class="text-lg md:text-xl leading-relaxed text-white/90 mb-8 animate-fade-in-up delay-500">
                    {{ $language->description ?? 'No description available for this language yet. Check back soon for
                    more details!' }}
                </p>

                @if($language->speakers)
                <div
                    class="mt-6 text-xl md:text-2xl text-white/90 font-semibold flex items-center gap-3 animate-fade-in-up delay-600">
                    <svg class="w-7 h-7 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h-2a4 4 0 01-4-4v-3a4 4 0 014-4h2a4 4 0 014 4v3a4 4 0 01-4 4z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 20h-2a4 4 0 01-4-4v-3a4 4 0 014-4h2a4 4 0 014 4v3a4 4 0 01-4 4z"></path>
                    </svg>
                    Estimated speakers: <strong class="text-white text-2xl md:text-3xl">{{ $language->speakers
                        }}</strong>
                </div>
                @endif
            </div>

            <div class="mt-16 text-center animate-fade-in-up delay-700">
                <a href="{{ route('languages.entries', $language->slug) }}"
                    class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white rounded-full text-xl font-bold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/50">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to {{ $language->name }} Entries
                </a>
            </div>

        </div>

        <div
            class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-gradient-to-tr from-gray-700 to-transparent rounded-full opacity-10 animate-blob">
        </div>
        <div
            class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-gradient-to-bl from-gray-700 to-transparent rounded-full opacity-10 animate-blob delay-500">
        </div>

    </section>

    {{-- Tailwind CSS Custom Animations (add this to your main CSS file or a <style>
        tag) --}}

        <style>@keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInOut 0.8s ease-out forwards;
            opacity: 0;
            /* Hidden by default */
        }

        .animate-fade-in-up.delay-100 {
            animation-delay: 0.1s;
        }

        .animate-fade-in-up.delay-200 {
            animation-delay: 0.2s;
        }

        .animate-fade-in-up.delay-300 {
            animation-delay: 0.3s;
        }

        .animate-fade-in-up.delay-400 {
            animation-delay: 0.4s;
        }

        .animate-fade-in-up.delay-500 {
            animation-delay: 0.5s;
        }

        .animate-fade-in-up.delay-600 {
            animation-delay: 0.6s;
        }

        .animate-fade-in-up.delay-700 {
            animation-delay: 0.7s;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0.9);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-scale-in {
            animation: scaleIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            opacity: 0;
        }

        @keyframes blob {
            0% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0, 0) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Subtle text shadow for better contrast on gradients */
        .text-shadow-sm {
            text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</x-layouts.app.guest>