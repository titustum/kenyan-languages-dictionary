<x-layouts.app :title="__('Dashboard')">
    <section class="py-12 bg-white dark:bg-gray-900 min-h-screen rounded-md text-gray-800 dark:text-white">
        <div class="max-w-8xl mx-auto px-4 lg:px-8">

            <!-- Welcome Header -->
            <div class="mb-10 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-2">
                    Welcome,
                    <span class="bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                        {{ Auth::user()->name }}
                    </span>!
                </h1>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Your linguistic journey continues here.</p>
            </div>

            <!-- Key Metrics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Contributions -->
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-purple-400 dark:hover:border-purple-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Your Contributions</h3>
                        <div class="text-purple-600 dark:text-purple-400 text-3xl">📝</div>
                    </div>
                    <p class="text-gray-900 dark:text-white text-4xl font-bold mb-2">{{
                        number_format($contributionCount ?? 129) }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Total words and audio added</p>
                </div>

                <!-- Languages Explored -->
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-blue-400 dark:hover:border-blue-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Languages Explored</h3>
                        <div class="text-blue-600 dark:text-blue-400 text-3xl">🌍</div>
                    </div>
                    <p class="text-gray-900 dark:text-white text-4xl font-bold mb-2">{{ $languagesExplored ?? 14 }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Unique languages you've contributed to</p>
                </div>

                <!-- Your Rank -->
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-emerald-400 dark:hover:border-emerald-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Your Rank</h3>
                        <div class="text-emerald-600 dark:text-emerald-400 text-3xl">🏆</div>
                    </div>
                    <p class="text-gray-900 dark:text-white text-4xl font-bold mb-2">#{{ $userRank ?? 5 }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Among all contributors</p>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <!-- Add English Words -->
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-purple-400 dark:hover:border-purple-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Add English Words</h3>
                        <div class="text-purple-600 dark:text-purple-400 text-3xl">📝</div>
                    </div>
                    <a href="{{ route('contribute.create') }}"
                        class="inline-block mt-4 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded">
                        Contribute New Words
                    </a>
                </div>

                <!-- Translate Words -->
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700 transition duration-300 hover:scale-[1.02] hover:border-blue-400 dark:hover:border-blue-600">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Translate Words</h3>
                        <div class="text-blue-600 dark:text-blue-400 text-3xl">🌍</div>
                    </div>
                    <a href="{{ route('concepts.index') }}"
                        class="inline-block mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded">
                        Translate Now
                    </a>
                </div>
            </div>

        </div>
    </section>
</x-layouts.app>