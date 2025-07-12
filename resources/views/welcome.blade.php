<x-layouts.app.guest>
    @push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        /* Base Styles */
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @endpush


    <section
        class="py-20 min-h-screen flex items-center justify-center overflow-hidden bg-gray-200 dark:bg-gray-900 transition-colors duration-500">


        <div class="max-w-7xl mx-auto px-6 lg:px-8 ">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8 animate-slide-in-left">
                    <div
                        class="inline-flex items-center px-6 py-3 feature-badge rounded-full text-emerald-600 dark:text-emerald-300 text-sm font-semibold micro-interaction bg-emerald-100 dark:bg-emerald-800/30">
                        <span class="w-3 h-3 bg-emerald-400 rounded-full mr-3"></span>
                        <span class="shimmer-bg">Preserving Cultural Heritage</span>
                    </div>

                    <h1 class="text-6xl md:text-7xl lg:text-8xl font-black leading-tight">
                        <span class="block gradient-text">Discover</span>
                        <span class="block text-gray-900 dark:text-white">Kenya's</span>
                        <span class="block gradient-text">Languages</span>
                    </h1>

                    <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-200 leading-relaxed max-w-2xl">
                        Immerse yourself in the rich tapestry of Kenyan languages. From Swahili shores to highland
                        dialects,
                        <span class="font-semibold text-emerald-600 dark:text-emerald-300">learn authentically</span>
                        with native speakers and cultural context.
                    </p>

                    <div class="flex flex-wrap gap-6 text-sm text-gray-500 dark:text-gray-300">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400 mr-2" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Native Speakers
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400 mr-2" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Cultural Context
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-emerald-500 dark:text-emerald-400 mr-2" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Free Access
                        </div>
                    </div>
                </div>

                <div class="space-y-8 animate-slide-in-right">
                    <div
                        class="form-container glass-morphism-strong rounded-3xl p-8 space-y-6 bg-white/80 dark:bg-white/10 backdrop-blur-sm border border-gray-200 dark:border-white/20">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Choose Your Language</h3>
                            <p class="text-gray-600 dark:text-gray-300">Select from 42+ authentic Kenyan languages</p>
                        </div>

                        {{-- show form validation errors --}}
                        @if ($errors->any())
                        <div class="bg-red-500/20 text-red-300 p-3 rounded-md text-center text-sm">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- Show session status messages --}}
                        @if (session('success'))
                        <div class="bg-green-500/20 text-green-300 p-3 rounded-md text-center text-sm">
                            {{ session('success') }}
                        </div>
                        @endif

                        {{-- Show session error messages --}}
                        @if (session('error'))
                        <div class="bg-red-500/20 text-red-300 p-3 rounded-md text-center text-sm">
                            {{ session('error') }}
                        </div>
                        @endif

                        {{-- Registration Form --}}

                        <form class="space-y-6 " action="{{ route('select.explore') }}" method="POST">
                            @csrf


                            <div class="relative">
                                <label for="language"
                                    class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">
                                    Select user category
                                </label>
                                <select id="category" name="category"
                                    class="w-full px-6 py-4 bg-white dark:bg-gray-600 backdrop-blur-sm border border-gray-300 dark:border-white/20 rounded-2xl text-gray-800 dark:text-white text-lg focus:outline-none focus:ring-2 focus:ring-emerald-400/50 input-focus"
                                    required>
                                    <option value="" disabled selected>Select your category...</option>
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="researcher">Researcher</option>
                                    <option value="developer">Developer</option>
                                    <option value="native">Native Speaker</option>
                                    <option value="enthusiast">Enthusiast</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="relative">
                                <label for="language"
                                    class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">Choose
                                    Language</label>
                                <select id="language" name="language"
                                    class="w-full px-6 py-4 bg-white dark:bg-gray-600 backdrop-blur-sm border border-gray-300 dark:border-white/20 rounded-2xl text-gray-800 dark:text-white text-lg focus:outline-none focus:ring-2 focus:ring-emerald-400/50 input-focus"
                                    required>
                                    <option value="" disabled selected>Select a language...</option>
                                    @foreach ($languages as $lang)
                                    <option value="{{ $lang->slug }}">{{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit"
                                class="w-full px-6 py-4 btn-primary text-white font-bold rounded-2xl text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 bg-emerald-500 hover:bg-emerald-600">
                                <span class="relative z-10">Explore language for free</span>
                            </button>
                        </form>

                        <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                            <p>🔒 Your data is secure • 🎯 Personalized learning • 🌍 Cultural immersion</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="flex flex-wrap justify-center gap-8 py-6 mb-12 animate-fade-in-up">
            <div class="text-center">
                <div class="text-4xl font-bold text-emerald-600 dark:text-emerald-400">42+</div>
                <div class="text-md text-gray-600 dark:text-gray-400">Languages</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 dark:text-blue-400">15K+</div>
                <div class="text-md text-gray-600 dark:text-gray-400">Words</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-purple-600 dark:text-purple-400">8K+</div>
                <div class="text-md text-gray-600 dark:text-gray-400">Audio Files</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-pink-600 dark:text-pink-400">2.5K+</div>
                <div class="text-md text-gray-600 dark:text-gray-400">Contributors</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="interactive-card glass-morphism rounded-2xl p-6 text-center animate-fade-in-up"
                style="animation-delay: 0.1s;">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-xl text-gray-900 dark:text-white mb-2">Audio Pronunciation</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">Learn from authentic native speaker recordings
                    for perfect pronunciation.</p>
            </div>

            <div class="interactive-card glass-morphism rounded-2xl p-6 text-center animate-fade-in-up"
                style="animation-delay: 0.2s;">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-xl text-gray-900 dark:text-white mb-2">Cultural Context</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">Explore the rich stories and traditions behind
                    each language.</p>
            </div>

            <div class="interactive-card glass-morphism rounded-2xl p-6 text-center animate-fade-in-up"
                style="animation-delay: 0.3s;">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-xl text-gray-900 dark:text-white mb-2">Vibrant Community</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">Connect with fellow learners and native speakers
                    to learn together.</p>
            </div>

            <div class="interactive-card glass-morphism rounded-2xl p-6 text-center animate-fade-in-up"
                style="animation-delay: 0.4s;">
                <div
                    class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h4 class="font-semibold text-xl text-gray-900 dark:text-white mb-2">Verified Content</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">Trust in our authentic and accurately curated
                    linguistic content.</p>
            </div>
        </div>
    </section>
</x-layouts.app.guest>