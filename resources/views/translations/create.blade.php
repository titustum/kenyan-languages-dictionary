<x-layouts.app.guest>
    <div class="max-w-4xl mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold text-white mb-6 text-center">
            Add Translation for: <span class="text-emerald-400">{{ $mainEntry->word_en }}</span>
        </h1>
        <p class="text-gray-300 text-center mb-8">
            Help us expand our dictionary by providing a translation for this English concept.
        </p>

        <div class="bg-gray-800 p-8 rounded-lg shadow-xl border border-gray-700 animate-fadeInUp">

            @if (session('success'))
            <div class="mb-4 p-4 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
            @endif


            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-600 text-white rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <form action="{{ route('contribute.translation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Hidden field for main_entry_id --}}
                <input type="hidden" name="main_entry_id" value="{{ $mainEntry->id }}">

                <div class="mb-5">
                    <label for="language_id" class="block text-gray-300 text-sm font-bold mb-2">
                        Select Language <span class="text-red-500">*</span>
                    </label>
                    <select name="language_id" id="language_id" required
                        class="shadow appearance-none border border-gray-700 rounded w-full py-3 px-4 bg-gray-900 text-white leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                        <option value="">-- Choose a Language --</option>
                        @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ old('language_id')==$language->id ? 'selected' : '' }}>
                            {{ $language->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('language_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="word" class="block text-gray-300 text-sm font-bold mb-2">
                        Your Translation in Selected Language <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="word" id="word" required
                        class="shadow appearance-none border border-gray-700 rounded w-full py-3 px-4 bg-gray-900 text-white leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                        value="{{ old('word') }}" placeholder="Enter the translation">
                    @error('word')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-gray-300 text-sm font-bold mb-2">
                        Description (Optional)
                    </label>
                    <textarea name="description" id="description" rows="3"
                        class="shadow appearance-none border border-gray-700 rounded w-full py-3 px-4 bg-gray-900 text-white leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                        placeholder="Provide a brief description of the translation or its usage.">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="example_sentence" class="block text-gray-300 text-sm font-bold mb-2">
                        Example Sentence (Optional)
                    </label>
                    <textarea name="example_sentence" id="example_sentence" rows="2"
                        class="shadow appearance-none border border-gray-700 rounded w-full py-3 px-4 bg-gray-900 text-white leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                        placeholder="Use the translation in an example sentence.">{{ old('example_sentence') }}</textarea>
                    @error('example_sentence')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="audio_path" class="block text-gray-300 text-sm font-bold mb-2">
                        Upload Audio Pronunciation (Optional)
                    </label>
                    <input type="file" name="audio_path" id="audio_path" accept="audio/mpeg, audio/wav" class="block w-full text-sm text-gray-400
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-purple-50 file:text-purple-700
                            hover:file:bg-purple-100
                            hover:cursor-pointer transition duration-200">
                    <p class="text-gray-500 text-xs mt-1">MP3 or WAV files, max 5MB.</p>
                    @error('audio_path')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:ring-4 focus:ring-emerald-500/50 transition duration-300 transform hover:scale-105">
                        Submit Translation
                    </button>
                    <a href="{{ route('concepts.index') }}"
                        class="inline-block align-baseline font-bold text-sm text-gray-400 hover:text-gray-200 transition duration-200">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app.guest>