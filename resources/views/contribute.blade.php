<x-layouts.app.guest>
    <div class="max-w-4xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-white mb-6">Contribute a New Word Concept (English)</h1>
        <p class="text-gray-300 mb-8">
            Use this form to add a new word concept to the dictionary, along with its English details.
            Native language translations can be added later.
        </p>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-600 text-white rounded">{{ session('success') }}</div>
        @endif

        {{-- Display Validation Errors --}}
        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-600 text-white rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('contribute.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white/5 border border-white/10 p-6 rounded-lg shadow-lg space-y-6">
            @csrf

            <div>
                <label for="word_en" class="block text-sm text-gray-300 mb-2">Word Concept (English)</label>
                <input type="text" name="word_en" id="word_en" value="{{ old('word_en') }}" required
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded @error('word_en') border-red-500 @enderror">
                @error('word_en')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description_en" class="block text-sm text-gray-300 mb-2">Description (English)
                    (Optional)</label>
                <textarea name="description_en" id="description_en" rows="3"
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded @error('description_en') border-red-500 @enderror">{{ old('description_en') }}</textarea>
                @error('description_en')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="example_sentence_en" class="block text-sm text-gray-300 mb-2">Example Sentence
                    (English) (Optional)</label>
                <textarea name="example_sentence_en" id="example_sentence_en" rows="3"
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded @error('example_sentence_en') border-red-500 @enderror">{{ old('example_sentence_en') }}</textarea>
                @error('example_sentence_en')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm text-gray-300 mb-2">Category</label>
                <select name="category_id" id="category_id" required
                    class="w-full p-3 bg-gray-800 text-white border border-gray-600 rounded @error('category_id') border-red-500 @enderror">
                    <option value="">Select a category</option> {{-- Added placeholder --}}
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image_path" class="block text-sm text-gray-300 mb-2">Concept Image (Optional)</label>
                <input type="file" name="image_path" id="image_path" accept="image/*"
                    class="text-white @error('image_path') border-red-500 @enderror">
                @error('image_path')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="audio_path" class="block text-sm text-gray-300 mb-2">English Pronunciation Audio
                    (Optional)</label>
                <input type="file" name="audio_path" id="audio_path" accept="audio/*"
                    class="text-white @error('audio_path') border-red-500 @enderror">
                @error('audio_path')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg hover:from-emerald-600 hover:to-emerald-700 transition">
                    Submit Word Concept
                </button>
            </div>
        </form>
    </div>
</x-layouts.app.guest>