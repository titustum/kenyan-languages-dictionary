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
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-purple-500 to-red-500 rounded-lg flex items-center justify-center font-bold text-lg">
                        M
                    </div>
                    <span class="text-xl font-bold">MotherLang</span>
                </a>

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
                    <a href="{{ route('login') }}"
                        class="bg-gradient-to-r from-purple-600 to-red-600 px-6 py-2 rounded-full hover:shadow-lg transition-all">
                        Get Started
                    </a>
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


    {{ $slot }}

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
                            M
                        </div>
                        <span class="text-xl font-bold">MotherLang</span>
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
                <p>&copy; 2025 MotherLang - Kenyan Languages Visual Dictionary. Built with Laravel & TailwindCSS.</p>
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