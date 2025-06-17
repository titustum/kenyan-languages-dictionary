<x-layouts.app.guest>
    <div class="max-w-4xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-white mb-6">Contribute a Word</h1>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-600 text-white rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('contribute.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white/5 border border-white/10 p-6 rounded-lg shadow-lg space-y-6">
            @csrf

            <!-- Language -->
            <div>
                <label for="language_id" class="block text-sm text-gray-300 mb-2">Language</label>
                <select name="language_id" id="language_id" required
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded">
                    @foreach($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Word -->
            <div>
                <label for="word" class="block text-sm text-gray-300 mb-2">Word (Native)</label>
                <input type="text" name="word" id="word" required
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded">
            </div>

            <!-- Translation -->
            <div>
                <label for="translation_en" class="block text-sm text-gray-300 mb-2">English Translation</label>
                <input type="text" name="translation_en" id="translation_en" required
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded">
            </div>

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm text-gray-300 mb-2">Category</label>
                <select name="category_id" id="category_id" required
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Example Sentence -->
            <div>
                <label for="example_sentence" class="block text-sm text-gray-300 mb-2">Example Sentence
                    (Optional)</label>
                <textarea name="example_sentence" id="example_sentence" rows="3"
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded"></textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image_path" class="block text-sm text-gray-300 mb-2">Image (Optional)</label>
                <input type="file" name="image_path" id="image_path" accept="image/*" class="text-white">
            </div>

            <!-- Audio Upload -->
            <div>
                <label for="audio_path" class="block text-sm text-gray-300 mb-2">Audio (Optional)</label>
                <input type="file" name="audio_path" id="audio_path" accept="audio/*" class="text-white">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg hover:from-emerald-600 hover:to-emerald-700 transition">
                    Submit Word
                </button>
            </div>
        </form>
    </div>
</x-layouts.app.guest>