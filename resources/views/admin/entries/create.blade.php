<x-layouts.app :title="__('Create New Entry')">
    <section class="py-12 min-h-screen text-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Header and Back Button -->
            <div class="mb-10 flex items-center justify-between">
                <a href="{{ url()->previous() }}" class="text-blue-400 hover:underline text-sm flex items-center group">
                    <svg class="w-4 h-4 mr-1 transform transition-transform group-hover:-translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back
                </a>
                <h1 class="text-3xl md:text-4xl font-extrabold text-white text-center">
                    Add New Dictionary Entry
                </h1>
                <div></div> {{-- Spacer for alignment --}}
            </div>

            <!-- Entry Creation Form -->
            <div class="bg-gray-800 rounded-xl p-6 sm:p-8 shadow-lg border border-gray-700">
                <form wire:submit.prevent="saveEntry" class="space-y-6">

                    <!-- Word -->
                    <div>
                        <label for="word" class="block text-sm font-medium text-gray-300 mb-2">Word</label>
                        <input type="text" id="word" wire:model="word" placeholder="Enter the word" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
                        @error('word') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Translation (English) -->
                    <div>
                        <label for="translation_en" class="block text-sm font-medium text-gray-300 mb-2">English
                            Translation</label>
                        <input type="text" id="translation_en" wire:model="translation_en"
                            placeholder="Enter English translation" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200">
                        @error('translation_en') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Language Dropdown -->
                    <div>
                        <label for="language_id" class="block text-sm font-medium text-gray-300 mb-2">Language</label>
                        <div class="relative">
                            <select id="language_id" wire:model="language_id" required
                                class="block w-full px-4 py-2 pr-8 bg-gray-700 border border-gray-600 rounded-md text-white appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200 cursor-pointer">
                                <option value="">Select a language</option>
                                {{-- Loop through languages passed from Livewire component --}}
                                @foreach($languages as $lang)
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-300">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('language_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category Dropdown -->
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <div class="relative">
                            <select id="category_id" wire:model="category_id"
                                class="block w-full px-4 py-2 pr-8 bg-gray-700 border border-gray-600 rounded-md text-white appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200 cursor-pointer">
                                <option value="">Select a category (Optional)</option>
                                {{-- Loop through categories passed from Livewire component --}}
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-300">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('category_id') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Example Sentence -->
                    <div>
                        <label for="example_sentence" class="block text-sm font-medium text-gray-300 mb-2">Example
                            Sentence (Optional)</label>
                        <textarea id="example_sentence" wire:model="example_sentence" rows="3"
                            placeholder="e.g., Jambo Kenya! (Hello Kenya!)"
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent transition duration-200"></textarea>
                        @error('example_sentence') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image_path" class="block text-sm font-medium text-gray-300 mb-2">Image
                            (Optional)</label>
                        <input type="file" id="image_path" wire:model="image_path" accept="image/*" class="w-full text-white text-sm file:mr-4 file:py-2 file:px-4
                                   file:rounded-full file:border-0 file:text-sm file:font-semibold
                                   file:bg-purple-500 file:text-white
                                   hover:file:bg-purple-600 transition duration-200 cursor-pointer">
                        @error('image_path') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror

                        @if ($image_path instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                        <img src="{{ $image_path->temporaryUrl() }}"
                            class="mt-4 h-32 w-auto rounded-md object-cover border border-gray-700" alt="Preview">
                        @elseif ($existing_image_path)
                        <img src="{{ asset('storage/' . $existing_image_path) }}"
                            class="mt-4 h-32 w-auto rounded-md object-cover border border-gray-700" alt="Current Image">
                        @endif
                    </div>

                    <!-- Audio Upload -->
                    <div>
                        <label for="audio_path" class="block text-sm font-medium text-gray-300 mb-2">Audio Pronunciation
                            (Optional)</label>
                        <input type="file" id="audio_path" wire:model="audio_path" accept="audio/*" class="w-full text-white text-sm file:mr-4 file:py-2 file:px-4
                                   file:rounded-full file:border-0 file:text-sm file:font-semibold
                                   file:bg-purple-500 file:text-white
                                   hover:file:bg-purple-600 transition duration-200 cursor-pointer">
                        @error('audio_path') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror

                        @if ($audio_path instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                        <audio controls src="{{ $audio_path->temporaryUrl() }}" class="w-full mt-4"></audio>
                        @elseif ($existing_audio_path)
                        <audio controls src="{{ asset('storage/' . $existing_audio_path) }}"
                            class="w-full mt-4"></audio>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-700 text-white font-semibold rounded-lg hover:from-green-700 hover:to-emerald-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-gray-900 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                            Save Entry
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</x-layouts.app>