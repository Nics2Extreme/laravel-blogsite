<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    {{ __('Edit Post') }}
                </h2>
            </div>
        </div>
    </x-slot>
    <!-- Create new post form -->
    <form action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-4 my-4">
        @csrf
        @method('put')
        <div class="mb-5">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
            <input type="text" name="title" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" value="{{ old('title', $post->title) }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-5">
            <input type="text" name="content" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" value="{{ old('content', $post->title) }}">
            @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post</button>
    </form>
</x-app-layout>