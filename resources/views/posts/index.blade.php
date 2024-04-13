<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('dashboard.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container-xl px-4 mt-n4">
            @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                {{ session('success') }}
            </div>
            @endif
        </div>
        @foreach ($posts as $post)
        <div class="max-w-7xl mx-auto mb-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-3xl mb-2">{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <span class="text-sm">{{ $post->post_date }}</span>
                </div>
                <div class="flex justify-end p-8">
                    <a href="{{ route('dashboard.edit', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold mx-2 my-4 py-2 px-4 rounded">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>