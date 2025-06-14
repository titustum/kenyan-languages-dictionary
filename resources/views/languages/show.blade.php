<x-layouts.app.guest>

    <section class="min-h-screen py-20 bg-gray-900 text-white relative overflow-hidden">

        <div class="max-w-5xl mx-auto px-6 lg:px-8 relative z-10">

            <!-- Back link -->
            <div class="mb-6">
                <a href="{{ route('languages.index') }}" class="text-blue-400 hover:underline flex items-center gap-2">
                    ← Back to Languages
                </a>
            </div>

            <!-- Language header -->
            <div class="text-center mb-12">
                <div class="text-6xl mb-4">
                    {{ $language->icon ?? '🗣️' }}
                </div>
                <h1 class="text-4xl font-bold mb-2">{{ $language->name }}</h1>
                <p class="text-gray-400">{{ $language->region }}</p>
            </div>

            <!-- Card with gradient background -->
            <div
                class="bg-gradient-to-br from-{{ $language->color ?? 'gray' }}-500 to-{{ $language->color ?? 'gray' }}-700 rounded-3xl p-8 shadow-lg text-white relative overflow-hidden">

                <!-- Optional Image -->
                @if($language->image_path)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $language->image_path) }}"
                        alt="{{ $language->name }} representative image"
                        class="w-full h-64 object-cover rounded-xl shadow-md">
                </div>
                @endif

                <!-- Description -->
                <h2 class="text-2xl font-semibold mb-4">About {{ $language->name }}</h2>
                <p class="text-lg leading-relaxed">
                    {{ $language->description ?? 'No description available for this language yet.' }}
                </p>

                <!-- Speakers -->
                @if($language->speakers)
                <div class="mt-6 text-sm text-white/80">
                    Estimated speakers: <strong>{{ $language->speakers }}</strong>
                </div>
                @endif
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <a href="{{ route('languages.entries', $language->slug) }}"
                    class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-lg font-semibold transition">
                    Explore Dictionary Entries →
                </a>
            </div>

        </div>
    </section>

</x-layouts.app.guest>