<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#1f2937" />
    <title>MotherLang - Preserve Kenya's Linguistic Heritage</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />


    @stack('styles')

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

<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-white transition-colors duration-500 overflow-x-hidden">

    <div id="mobile-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

    <nav id="mobile-nav"
        class="fixed top-0 left-0 h-full w-80 bg-white text-gray-800 border-r border-gray-200 z-50 transform slide-in-left transition-transform duration-300 ease-in-out lg:hidden shadow-lg">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <svg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color:#a855f7; stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#ef4444; stop-opacity:1" />
                            </linearGradient>
                            <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                                <feDropShadow dx="0" dy="2" stdDeviation="4" flood-color="rgba(0,0,0,0.25)" />
                            </filter>
                        </defs>
                        <rect x="0" y="0" width="40" height="40" rx="10" fill="url(#grad)" filter="url(#shadow)" />
                        <text x="50%" y="50%" text-anchor="middle" dominant-baseline="central" fill="white"
                            font-size="18" font-family="Arial, sans-serif" font-weight="bold">
                            M
                        </text>
                    </svg>
                    <span class="text-xl font-bold text-gray-800">MotherLang</span>
                </div>
                <button id="close-mobile-nav"
                    class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <div class="flex-1 px-6 py-8 overflow-y-auto">
                <div class="space-y-6">
                    <a href="/" class="flex items-center space-x-3 text-emerald-600 font-medium">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Home</span>
                    </a>
                    <a href="/languages"
                        class="flex items-center space-x-3 text-gray-600 hover:text-gray-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <span>Languages</span>
                    </a>
                    <a href="/leran"
                        class="flex items-center space-x-3 text-gray-600 hover:text-gray-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span>Learn</span>
                    </a>
                    <a href="/contribute"
                        class="flex items-center space-x-3 text-gray-600 hover:text-gray-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                        <span>Contribute</span>
                    </a>
                    <a href="/about"
                        class="flex items-center space-x-3 text-gray-600 hover:text-gray-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>About</span>
                    </a>
                    <!-- Continue the same pattern for Learn, Contribute, About -->
                </div>

                <div class="mt-12 space-y-4">
                    <a href="/login"
                        class="block w-full px-6 py-3 text-center bg-gray-100 border border-gray-300 rounded-xl font-medium hover:bg-gray-200 transition-all">
                        Sign In
                    </a>
                    <a href="/register"
                        class="block w-full px-6 py-3 text-center bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-xl font-medium hover:from-emerald-600 hover:to-emerald-700 transition-all shadow-lg">
                        Get Started
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center justify-center space-x-4">
                    <a href="#"
                        class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition-colors">
                        <!-- Twitter icon -->
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <!-- Add other icons similarly -->
                </div>
            </div>
        </div>
    </nav>


    <header class="fixed top-0 left-0 right-0 z-30 glass-morphism border-b border-white/10 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-r from-purple-500 to-red-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">M</span>
                    </div>
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-emerald-400 to-blue-400 bg-clip-text text-transparent">
                            MotherLang</h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400 -mt-1">Preserve • Learn • Share</p>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/"
                        class="text-emerald-600 dark:text-emerald-400 font-medium hover:text-emerald-500 transition-colors">Home</a>
                    <a href="/languages"
                        class="text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors">Languages</a>
                    <a href="/learn"
                        class="text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors">Learn</a>
                    <a href="/contribute"
                        class="text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors">Contribute</a>
                    <a href="/about"
                        class="text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors">About</a>
                </nav>

                <div class="hidden lg:flex items-center space-x-4">
                    <a href="/login"
                        class="text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white transition-colors">Sign
                        In</a>
                    <a href="/register"
                        class="px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-xl font-medium hover:from-emerald-600 hover:to-emerald-700 transform hover:scale-105 transition-all duration-300 shadow-lg shadow-emerald-500/25">
                        Get Started
                    </a>

                    <button id="theme-toggle" class="ml-4 text-xl hover:scale-110 transition-transform"
                        title="Toggle theme">
                        <svg id="theme-toggle-light-icon" class="w-6 h-6 hidden" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 2a.75.75 0 01.75.75V4a.75.75 0 01-1.5 0V2.75A.75.75 0 0110 2zM4.22 4.22a.75.75 0 011.06 0l.53.53a.75.75 0 11-1.06 1.06l-.53-.53a.75.75 0 010-1.06zM2 10a.75.75 0 01.75-.75H4a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm8 6a.75.75 0 01.75.75V18a.75.75 0 01-1.5 0v-1.25A.75.75 0 0110 16zm5.78-1.78a.75.75 0 011.06 1.06l-.53.53a.75.75 0 11-1.06-1.06l.53-.53zM16 10a.75.75 0 01.75-.75H18a.75.75 0 010 1.5h-1.25A.75.75 0 0116 10zm-2.22-5.78a.75.75 0 010 1.06l-.53.53a.75.75 0 11-1.06-1.06l.53-.53a.75.75 0 011.06 0z" />
                            <path d="M10 6a4 4 0 100 8 4 4 0 000-8z" />
                        </svg>
                        <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293a8 8 0 01-10.586-10.586 8.002 8.002 0 1010.586 10.586z" />
                        </svg>
                    </button>
                </div>

                <button id="mobile-menu-btn"
                    class="lg:hidden w-10 h-10 flex items-center justify-center rounded-lg hover:bg-black/10 dark:hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="pt-20">
        {{ $slot }}
    </main>

    <footer class="bg-white dark:bg-gray-900 py-12 border-t border-gray-200 dark:border-gray-800 transition-colors">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-gray-600 dark:text-gray-400">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-purple-500 to-red-500 rounded-lg flex items-center justify-center font-bold text-lg text-white">
                            M</div>
                        <span class="text-xl font-bold text-gray-800 dark:text-white">MotherLang</span>
                    </div>
                    <p>Preserving Kenya's linguistic heritage through community collaboration.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Languages</h4>
                    <div class="space-y-2">
                        <div>Kikuyu</div>
                        <div>Swahili</div>
                        <div>Luo</div>
                        <div>Maasai</div>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Community</h4>
                    <div class="space-y-2">
                        <div>Contributors</div>
                        <div>Leaderboard</div>
                        <div>Guidelines</div>
                        <div>Support</div>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">About</h4>
                    <div class="space-y-2">
                        <div>Our Mission</div>
                        <div>Contact</div>
                        <div>Privacy</div>
                        <div>Terms</div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; 2025 MotherLang. Built with Laravel & TailwindCSS.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const lightIcon = document.getElementById('theme-toggle-light-icon');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');

        function updateThemeIcon(isDark) {
            darkIcon.classList.toggle('hidden', !isDark);
            lightIcon.classList.toggle('hidden', isDark);
        }

        function setTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                updateThemeIcon(true);
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                updateThemeIcon(false);
            }
        }

        // Init: Always start in light mode unless a dark mode preference is explicitly saved
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            setTheme('dark');
        } else {
            setTheme('light'); // Default to light mode
        }

        // Toggle
        themeToggleBtn.addEventListener('click', () => {
            const isDark = document.documentElement.classList.contains('dark');
            setTheme(isDark ? 'light' : 'dark');
        });

        // Mobile Menu
        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-nav').classList.add('active');
            document.getElementById('mobile-overlay').classList.remove('hidden');
        });

        document.getElementById('close-mobile-nav')?.addEventListener('click', () => {
            document.getElementById('mobile-nav').classList.remove('active');
            document.getElementById('mobile-overlay').classList.add('hidden');
        });

        document.getElementById('mobile-overlay')?.addEventListener('click', () => {
            document.getElementById('mobile-nav').classList.remove('active');
            document.getElementById('mobile-overlay').classList.add('hidden');
        });
    </script>
</body>

</html>