<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-700">
                    <h1 class="text-2xl font-bold text-white mb-6">Create Post</h1>
                    <hr class="border-gray-600 mb-6">
                    <form class="w-full max-w-2xl mx-auto" method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-white font-bold mb-2" for="title">Title</label>
                            <input class="border border-gray-600 rounded w-full py-3 px-4 text-gray-900" id="title" type="text" name="title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-white text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-white font-bold mb-2" for="body">Body</label>
                            <textarea class="resize border border-gray-600 rounded w-full py-3 px-4 text-gray-900" name="body" style="min-height: 200px;">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="text-white text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="submit" class="shadow bg-lime-500 hover:bg-lime-400 focus:shadow-outline focus:outline-none focus:ring-2 focus:ring-lime-300 text-white font-bold py-3 px-6 rounded" value="Post">
                        </div>
                    </form>
                    @if (session()->has('status'))
                    <div class="mt-5 bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
