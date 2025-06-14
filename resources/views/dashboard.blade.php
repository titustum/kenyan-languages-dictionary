<x-layouts.app :title="__('Dashboard')">
    <section class="py-12 bg-gray-900 min-h-screen rounded-md text-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Welcome Header -->
            <div class="mb-10 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-2">
                    Welcome, <span
                        class="bg-gradient-to-r from-purple-400 to-indigo-500 bg-clip-text text-transparent">{{
                        Auth::user()->name ?? 'Contributor' }}</span>!
                </h1>
                <p class="text-gray-400 text-lg">Your linguistic journey continues here.</p>
            </div>

            <!-- Key Metrics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Card 1: Your Contributions -->
                <div
                    class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-purple-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-300">Your Contributions</h3>
                        <div class="text-purple-400 text-3xl">📝</div>
                    </div>
                    <p class="text-white text-4xl font-bold mb-2">1,245</p> {{-- Placeholder for actual count --}}
                    <p class="text-gray-400">Total words and audio added</p>
                </div>

                <!-- Card 2: Languages Explored -->
                <div
                    class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-blue-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-300">Languages Explored</h3>
                        <div class="text-blue-400 text-3xl">🌍</div>
                    </div>
                    <p class="text-white text-4xl font-bold mb-2">15</p> {{-- Placeholder for actual count --}}
                    <p class="text-gray-400">Unique languages you've contributed to</p>
                </div>

                <!-- Card 3: Your Rank -->
                <div
                    class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-emerald-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-300">Your Rank</h3>
                        <div class="text-emerald-400 text-3xl">🏆</div>
                    </div>
                    <p class="text-white text-4xl font-bold mb-2">#3</p> {{-- Placeholder for actual rank --}}
                    <p class="text-gray-400">Among all contributors</p>
                </div>
            </div>

            <!-- Main Content Area: Recent Activity & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
                    <h2 class="text-2xl font-bold text-white mb-6">Recent Activity</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start bg-gray-700 p-4 rounded-lg">
                            <div class="flex-shrink-0 text-yellow-400 text-xl mr-3">✨</div>
                            <div>
                                <p class="text-white font-semibold">Added new word: <span
                                        class="text-purple-400">"Harambee"</span> (Swahili)</p>
                                <p class="text-gray-400 text-sm">2 hours ago - Category: Community</p>
                            </div>
                        </li>
                        <li class="flex items-start bg-gray-700 p-4 rounded-lg">
                            <div class="flex-shrink-0 text-blue-400 text-xl mr-3">🔊</div>
                            <div>
                                <p class="text-white font-semibold">Uploaded audio for: <span
                                        class="text-purple-400">"Njeri"</span> (Gikuyu)</p>
                                <p class="text-gray-400 text-sm">Yesterday - Category: Names</p>
                            </div>
                        </li>
                        <li class="flex items-start bg-gray-700 p-4 rounded-lg">
                            <div class="flex-shrink-0 text-green-400 text-xl mr-3">🆕</div>
                            <div>
                                <p class="text-white font-semibold">Contributed example for: <span
                                        class="text-purple-400">"Erokamano"</span> (Luo)</p>
                                <p class="text-gray-400 text-sm">3 days ago - Category: Greetings</p>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center mt-6">
                        <a href="#"
                            class="inline-block text-purple-400 hover:text-purple-300 font-semibold transition-colors text-sm">View
                            all activity →</a>
                    </div>
                </div>

                <!-- Quick Actions / Contributor Links -->
                <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
                    <h2 class="text-2xl font-bold text-white mb-6">Quick Actions</h2>
                    <div class="flex flex-col space-y-4">
                        <a href="#"
                            class="w-full bg-gradient-to-r from-purple-600 to-indigo-700 text-white py-3 px-6 rounded-lg text-lg font-semibold text-center
                                          hover:from-purple-700 hover:to-indigo-800 transition duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md">
                            Add New Word Entry
                        </a>
                        <a href="#"
                            class="w-full bg-gradient-to-r from-blue-600 to-cyan-700 text-white py-3 px-6 rounded-lg text-lg font-semibold text-center
                                          hover:from-blue-700 hover:to-cyan-800 transition duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md">
                            View My Contributions
                        </a>
                        <a href="#"
                            class="w-full bg-gradient-to-r from-emerald-600 to-green-700 text-white py-3 px-6 rounded-lg text-lg font-semibold text-center
                                          hover:from-emerald-700 hover:to-green-800 transition duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md">
                            Check Leaderboard
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layouts.app>