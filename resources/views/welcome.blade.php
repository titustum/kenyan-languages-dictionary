<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lugha - Kenyan Languages Visual Dictionary</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #dc2626 100%);
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
        }

        .language-card {
            transition: all 0.3s ease;
            transform: translateZ(0);
        }

        .language-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .pulse-glow {
            animation: pulseGlow 2s infinite;
        }

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(124, 58, 237, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(124, 58, 237, 0.6);
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
</head>

<body class="bg-gray-900 text-white overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect border-b border-white/10"
        x-data="{ open: false, searchOpen: false, searchQuery: '' }">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-purple-500 to-red-500 rounded-lg flex items-center justify-center font-bold text-lg">
                        L
                    </div>
                    <span class="text-xl font-bold">Lugha</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <!-- Search Form -->
                    <div class="relative">
                        <form class="relative flex items-center">
                            <input type="text" placeholder="Search words..."
                                class="bg-white/10 border border-white/20 rounded-full px-4 py-2 pl-10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all w-64"
                                x-model="searchQuery">
                            <svg class="w-5 h-5 text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <button type="submit"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-purple-600 to-red-600 rounded-full p-1.5 hover:shadow-lg transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <a href="#features" class="hover:text-purple-400 transition-colors">Features</a>
                    <a href="#languages" class="hover:text-purple-400 transition-colors">Languages</a>
                    <a href="#community" class="hover:text-purple-400 transition-colors">Community</a>
                    <button
                        class="bg-gradient-to-r from-purple-600 to-red-600 px-6 py-2 rounded-full hover:shadow-lg transition-all">
                        Get Started
                    </button>
                </div>

                <!-- Mobile/Tablet Navigation -->
                <div class="flex lg:hidden items-center space-x-3">
                    <!-- Mobile Search Toggle -->
                    <button @click="searchOpen = !searchOpen" class="p-2 hover:text-purple-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Mobile Menu Toggle -->
                    <button @click="open = !open" class="p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Search Bar -->
            <div x-show="searchOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden pb-4">
                <form class="relative flex items-center">
                    <input type="text" placeholder="Search words..."
                        class="bg-white/10 border border-white/20 rounded-full px-4 py-2 pl-10 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all w-full">
                    <svg class="w-5 h-5 text-gray-300 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <button type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-purple-600 to-red-600 rounded-full p-1.5 hover:shadow-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Mobile Menu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#features" class="hover:text-purple-400 transition-colors">Features</a>
                    <a href="#languages" class="hover:text-purple-400 transition-colors">Languages</a>
                    <a href="#community" class="hover:text-purple-400 transition-colors">Community</a>
                    <button
                        class="bg-gradient-to-r from-purple-600 to-red-600 px-6 py-2 rounded-full hover:shadow-lg transition-all text-center">
                        Get Started
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center gradient-bg overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="floating absolute top-20 left-10 w-20 h-20 bg-white rounded-full blur-xl"></div>
            <div class="floating absolute top-40 right-20 w-32 h-32 bg-purple-400 rounded-full blur-2xl"
                style="animation-delay: -2s;"></div>
            <div class="floating absolute bottom-40 left-1/4 w-24 h-24 bg-red-400 rounded-full blur-xl"
                style="animation-delay: -4s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <div class="slide-in-left">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Discover Kenya's
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                        Linguistic Heritage
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-8 max-w-3xl mx-auto leading-relaxed">
                    An interactive visual dictionary celebrating the rich tapestry of 43+ Kenyan languages.
                    Learn, contribute, and preserve our cultural treasures together.
                </p>
            </div>

            <div class="slide-in-right flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                <button
                    class="px-8 py-4 bg-white text-gray-900 rounded-full text-lg font-semibold hover:bg-gray-100 transition-all pulse-glow">
                    Explore Languages
                </button>
                <a href="{{ route('login') }}"
                    class="px-8 py-4 border-2 border-white rounded-full text-lg font-semibold hover:bg-white hover:text-gray-900 transition-all">
                    Join Community
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-400">43+</div>
                    <div class="text-gray-300">Languages</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-400">10K+</div>
                    <div class="text-gray-300">Words</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-red-400">500+</div>
                    <div class="text-gray-300">Contributors</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-400">100K+</div>
                    <div class="text-gray-300">Audio Files</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Powerful Features</h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    Experience language learning like never before with immersive visual and audio content
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-gradient-to-b from-gray-700 to-gray-800 rounded-2xl p-8 hover:from-purple-900 hover:to-gray-800 transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Visual Learning</h3>
                    <p class="text-gray-300">Rich image galleries paired with words for enhanced comprehension and
                        cultural context.</p>
                </div>

                <div
                    class="bg-gradient-to-b from-gray-700 to-gray-800 rounded-2xl p-8 hover:from-blue-900 hover:to-gray-800 transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Audio Pronunciation</h3>
                    <p class="text-gray-300">Native speaker recordings for authentic pronunciation and tone mastery.</p>
                </div>

                <div
                    class="bg-gradient-to-b from-gray-700 to-gray-800 rounded-2xl p-8 hover:from-green-900 hover:to-gray-800 transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Community Driven</h3>
                    <p class="text-gray-300">Collaborative platform where native speakers contribute and preserve their
                        linguistic heritage.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Languages Showcase -->
    <section id="languages" class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Explore Kenya's Languages</h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                    From Kikuyu to Turkana, discover the linguistic diversity that makes Kenya unique
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <div
                    class="language-card bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-6 text-center cursor-pointer">
                    <div class="text-3xl mb-3">🏔️</div>
                    <div class="font-semibold">Kikuyu</div>
                    <div class="text-sm opacity-80">Central Kenya</div>
                </div>
                <div
                    class="language-card bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl p-6 text-center cursor-pointer">
                    <div class="text-3xl mb-3">🌊</div>
                    <div class="font-semibold">Swahili</div>
                    <div class="text-sm opacity-80">Coastal</div>
                </div>
                <div
                    class="language-card bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl p-6 text-center cursor-pointer">
                    <div class="text-3xl mb-3">🌿</div>
                    <div class="font-semibold">Luo</div>
                    <div class="text-sm opacity-80">Western Kenya</div>
                </div>
                <div
                    class="language-card bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl p-6 text-center cursor-pointer">
                    <div class="text-3xl mb-3">🦁</div>
                    <div class="font-semibold">Maasai</div>
                    <div class="text-sm opacity-80">Rift Valley</div>
                </div>
                <div
                    class="language-card bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-center cursor-pointer">
                    <div class="text-3xl mb-3">🏜️</div>
                    <div class="font-semibold">Turkana</div>
                    <div class="text-sm opacity-80">Northern Kenya</div>
                </div>
                <div
                    class="language-card bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl p-6 text-center cursor-pointer">
                    <div class="text-3xl mb-3">⭐</div>
                    <div class="font-semibold">+38 More</div>
                    <div class="text-sm opacity-80">Discover All</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section id="community" class="py-20 bg-gradient-to-b from-gray-800 to-gray-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">Join Our Community</h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Be part of preserving Kenya's linguistic heritage. Contribute words, audio, and cultural context
                        while earning recognition as a top contributor.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Add new words and meanings</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Contribute audio pronunciations</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Share cultural context and stories</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="text-lg">Earn contributor recognition</span>
                        </div>
                    </div>
                </div>
                <div class="glass-effect rounded-3xl p-8">
                    <h3 class="text-2xl font-bold mb-6 text-center">Top Contributors</h3>
                    <div class="space-y-4">
                        <div
                            class="flex items-center space-x-4 p-4 bg-gradient-to-r from-yellow-500/20 to-orange-500/20 rounded-xl">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center font-bold">
                                1
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold">Grace Wanjiku</div>
                                <div class="text-sm text-gray-400">2,847 contributions</div>
                            </div>
                            <div class="text-2xl">🏆</div>
                        </div>
                        <div
                            class="flex items-center space-x-4 p-4 bg-gradient-to-r from-gray-500/20 to-gray-600/20 rounded-xl">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center font-bold">
                                2
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold">Samuel Kiprotich</div>
                                <div class="text-sm text-gray-400">1,923 contributions</div>
                            </div>
                            <div class="text-2xl">🥈</div>
                        </div>
                        <div
                            class="flex items-center space-x-4 p-4 bg-gradient-to-r from-orange-500/20 to-red-500/20 rounded-xl">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-orange-400 to-red-500 rounded-full flex items-center justify-center font-bold">
                                3
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold">Amina Hassan</div>
                                <div class="text-sm text-gray-400">1,654 contributions</div>
                            </div>
                            <div class="text-2xl">🥉</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="floating absolute top-10 right-10 w-32 h-32 bg-white rounded-full blur-2xl"></div>
            <div class="floating absolute bottom-20 left-20 w-24 h-24 bg-yellow-400 rounded-full blur-xl"
                style="animation-delay: -3s;"></div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto text-center px-6 lg:px-8">
            <h2 class="text-4xl md:text-6xl font-bold mb-6">
                Start Your Language Journey Today
            </h2>
            <p class="text-xl md:text-2xl text-gray-200 mb-10 max-w-2xl mx-auto">
                Join thousands of language enthusiasts in preserving and celebrating Kenya's rich linguistic heritage.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button
                    class="px-10 py-4 bg-white text-gray-900 rounded-full text-lg font-bold hover:bg-gray-100 transition-all pulse-glow">
                    Explore Languages
                </button>
                <button
                    class="px-10 py-4 border-2 border-white rounded-full text-lg font-bold hover:bg-white hover:text-gray-900 transition-all">
                    Become a Contributor
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-purple-500 to-red-500 rounded-lg flex items-center justify-center font-bold text-lg">
                            L
                        </div>
                        <span class="text-xl font-bold">Lugha</span>
                    </div>
                    <p class="text-gray-400">Preserving Kenya's linguistic heritage through community collaboration.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Languages</h4>
                    <div class="space-y-2 text-gray-400">
                        <div>Kikuyu</div>
                        <div>Swahili</div>
                        <div>Luo</div>
                        <div>Maasai</div>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Community</h4>
                    <div class="space-y-2 text-gray-400">
                        <div>Contributors</div>
                        <div>Leaderboard</div>
                        <div>Guidelines</div>
                        <div>Support</div>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">About</h4>
                    <div class="space-y-2 text-gray-400">
                        <div>Our Mission</div>
                        <div>Contact</div>
                        <div>Privacy</div>
                        <div>Terms</div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Lugha - Kenyan Languages Visual Dictionary. Built with Laravel & TailwindCSS.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navigation
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.style.background = 'rgba(17, 24, 39, 0.9)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.1)';
            }
        });

        // Language card interactions
        document.querySelectorAll('.language-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.3)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = 'none';
            });
        });

        // Counter animation for stats
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + (target >= 1000 ? 'K+' : '+');
            }, 20);
        }

        // Trigger animations when stats come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statElements = entry.target.querySelectorAll('.text-4xl');
                    statElements.forEach((el, index) => {
                        const targets = [43, 10, 500, 100];
                        setTimeout(() => {
                            animateCounter(el, targets[index]);
                        }, index * 200);
                    });
                    observer.unobserve(entry.target);
                }
            });
        });

        // Observe the stats section
        const statsSection = document.querySelector('.grid.grid-cols-2.md\\:grid-cols-4');
        if (statsSection) {
            observer.observe(statsSection);
        }
    </script>
</body>

</html>