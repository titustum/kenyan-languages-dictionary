<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotherLang - Preserve Kenya's Linguistic Heritage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-morphism {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
        }

        .slide-in-left {
            transform: translateX(-100%);
        }

        .slide-in-left.active {
            transform: translateX(0);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="bg-gray-900 text-white overflow-x-hidden">

    <!-- Mobile Menu Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

    <!-- Mobile Navigation (Slides from left) -->
    <nav id="mobile-nav"
        class="fixed top-0 left-0 h-full w-80 bg-gradient-to-b from-slate-900 via-gray-900 to-slate-800 z-50 transform slide-in-left transition-transform duration-300 ease-in-out lg:hidden border-r border-white/10 backdrop-blur-xl">
        <div class="flex flex-col h-full">
            <!-- Mobile Header -->
            <div class="flex items-center justify-between p-6 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-purple-500 to-red-500  rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-lg">M</span>
                    </div>
                    <span
                        class="text-xl font-bold bg-gradient-to-r from-emerald-400 to-blue-400 bg-clip-text text-transparent">MotherLang</span>
                </div>
                <button id="close-mobile-nav"
                    class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Items -->
            <div class="flex-1 px-6 py-8 overflow-y-auto">
                <div class="space-y-6">
                    <a href="/" class="flex items-center space-x-3 text-emerald-400 font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Home</span>
                    </a>
                    <a href="/languages"
                        class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span>Languages</span>
                    </a>
                    <a href="/learn"
                        class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span>Learn</span>
                    </a>
                    <a href="/contribute"
                        class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                        <span>Contribute</span>
                    </a>
                    <a href="/about"
                        class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>About</span>
                    </a>
                </div>

                <!-- Mobile CTA Buttons -->
                <div class="mt-12 space-y-4">
                    <a href="/login"
                        class="block w-full px-6 py-3 text-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl font-medium hover:bg-white/20 transition-all">
                        Sign In
                    </a>
                    <a href="/register"
                        class="block w-full px-6 py-3 text-center bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl font-medium hover:from-emerald-600 hover:to-emerald-700 transition-all shadow-lg">
                        Get Started
                    </a>
                </div>
            </div>

            <!-- Mobile Footer -->
            <div class="p-6 border-t border-white/10">
                <div class="flex items-center justify-center space-x-4">
                    <a href="#"
                        class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-white/20 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Desktop Header -->
    <header class="fixed top-0 left-0 right-0 z-30 glass-morphism border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-r from-purple-500 to-red-500  rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">M</span>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-emerald-400 to-blue-400 bg-clip-text text-transparent">
                            MotherLang</h1>
                        <p class="text-xs text-gray-400 -mt-1">Preserve • Learn • Share</p>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-emerald-400 font-medium hover:text-emerald-300 transition-colors">Home</a>
                    <a href="/languages" class="text-gray-300 hover:text-white transition-colors">Languages</a>
                    <a href="/learn" class="text-gray-300 hover:text-white transition-colors">Learn</a>
                    <a href="/contribute" class="text-gray-300 hover:text-white transition-colors">Contribute</a>
                    <a href="/about" class="text-gray-300 hover:text-white transition-colors">About</a>
                </nav>

                <!-- Desktop CTA Buttons -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="/login" class="px-6 py-2.5 text-gray-300 hover:text-white transition-colors">Sign In</a>
                    <a href="/register"
                        class="px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-xl font-medium hover:from-emerald-600 hover:to-emerald-700 transform hover:scale-105 transition-all duration-300 shadow-lg shadow-emerald-500/25">
                        Get Started
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn"
                    class="lg:hidden w-10 h-10 flex items-center justify-center rounded-lg hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20">

        {{ $slot }}


        <!-- Footer -->
        <footer class="bg-gray-900 py-12 border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-purple-500 to-red-500 rounded-lg flex items-center justify-center font-bold text-lg">
                                M
                            </div>
                            <span class="text-xl font-bold">MotherLang</span>
                        </div>
                        <p class="text-gray-400">Preserving Kenya's linguistic heritage through community collaboration.
                        </p>
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
                    <p>&copy; 2025 MotherLang - Kenyan Languages Visual Dictionary. Built with Laravel & TailwindCSS.
                    </p>
                </div>
            </div>
        </footer>

        @stack('scripts')

        <script>
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileNav = document.getElementById('mobile-nav');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const closeMobileNav = document.getElementById('close-mobile-nav');

            const openMenu = () => {
                mobileNav.classList.add('active');
                mobileOverlay.classList.remove('hidden');
            };

            const closeMenu = () => {
                mobileNav.classList.remove('active');
                mobileOverlay.classList.add('hidden');
            };

            mobileMenuBtn.addEventListener('click', openMenu);
            closeMobileNav.addEventListener('click', closeMenu);
            mobileOverlay.addEventListener('click', closeMenu);
        </script>
</body>

</html>