<x-layouts.app.guest>
    <div class="max-w-4xl mx-auto px-6 py-12  text-gray-900 dark:bg-gray-900 dark:text-white">



        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Contribute a New Word Concept (English)</h1>
        <p class="text-gray-700 mb-8 dark:text-gray-300">
            Use this form to add a new word concept to the dictionary, along with its English details.
            Native language translations can be added later.
        </p>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded dark:bg-green-600 dark:text-white">
            {{ session('success') }}
        </div>
        @endif

        {{-- Display Validation Errors --}}
        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded dark:bg-red-600 dark:text-white">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('contribute.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-xl space-y-6 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            @csrf

            <div>
                <label for="word_en" class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Word
                    Concept (English)</label>
                <input type="text" name="word_en" id="word_en" value="{{ old('word_en') }}" required class="w-full p-3 bg-gray-50 text-gray-800 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500
                    @error('word_en') border-red-500 @enderror dark:bg-gray-700 dark:text-white dark:border-gray-600">
                @error('word_en')
                <p class="text-red-600 text-xs mt-1 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description_en"
                    class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Description (English)
                    (Optional)</label>
                <textarea name="description_en" id="description_en" rows="3"
                    class="w-full p-3 bg-gray-50 text-gray-800 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500
                    @error('description_en') border-red-500 @enderror dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('description_en') }}</textarea>
                @error('description_en')
                <p class="text-red-600 text-xs mt-1 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="example_sentence_en"
                    class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Example Sentence
                    (English) (Optional)</label>
                <textarea name="example_sentence_en" id="example_sentence_en" rows="3"
                    class="w-full p-3 bg-gray-50 text-gray-800 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500
                    @error('example_sentence_en') border-red-500 @enderror dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('example_sentence_en') }}</textarea>
                @error('example_sentence_en')
                <p class="text-red-600 text-xs mt-1 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id"
                    class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Category</label>
                <select name="category_id" id="category_id" required
                    class="w-full p-3 bg-gray-50 text-gray-800 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500
                    @error('category_id') border-red-500 @enderror dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-600 text-xs mt-1 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">Concept
                    Image (Optional)</label>
                <input type="file" name="image_path" id="image_path" accept="image/*" class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100
                    @error('image_path') border-red-500 @enderror
                    dark:text-gray-300 dark:file:bg-gray-600 dark:file:text-white dark:hover:file:bg-gray-700">
                @error('image_path')
                <p class="text-red-600 text-xs mt-1 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="audio_path" class="block text-sm font-medium text-gray-700 mb-2 dark:text-gray-300">English
                    Pronunciation Audio
                    (Optional)</label>
                <input type="file" name="audio_path" id="audio_path" accept="audio/*" class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100
                    @error('audio_path') border-red-500 @enderror
                    dark:text-gray-300 dark:file:bg-gray-600 dark:file:text-white dark:hover:file:bg-gray-700">
                @error('audio_path')
                <p class="text-red-600 text-xs mt-1 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="px-6 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition-colors duration-200 shadow-md
                    focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    Submit Word Concept
                </button>
            </div>
        </form>
    </div>
</x-layouts.app.guest>