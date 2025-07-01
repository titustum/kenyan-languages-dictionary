<x-layouts.app.guest language="{{ $language->name }}">

    <section id="languages"
        class="py-24 px-2 min-h-[70vh] bg-gradient-to-br from-white via-gray-50 to-gray-100 dark:from-gray-900 dark:via-slate-900 dark:to-gray-800 relative overflow-hidden transition-colors duration-500">


        <div class="max-w-6xl mx-auto p-6 rounded bg-white">
            <div class="text-4xl text-center mb-4 transform group-hover:scale-110 transition-transform duration-300">
                {{ $language->icon ?? '🗣️' }}
            </div>
            <h1 class="captialize text-3xl font-bold text-center">{{ $language->name }} Language</h1>
            <div class="text-center mt-2">
                {{ $language->description ?? 'No description' }}
            </div>


            <div class="text-center mt-6">
                <a href="{{ route('languages.entries', $language) }}"
                    class=" bg-blue-600 hover:bg-blue-700 mx-auto rounded-md text-white px-6 py-3">
                    Back To {{ $language->name }} Entries
                </a>
            </div>


        </div>


    </section>
</x-layouts.app.guest>