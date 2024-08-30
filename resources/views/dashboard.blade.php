<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
    @if (session()->has('status'))
        <div class="mb-5 bg-purple-600 text-white text-sm font-bold py-2 px-4 ">
            {{ session('status') }}
        </div>
    @endif
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-700">
                    <header class="p-4 bg-gray-800 text-white mb-6">
                        <h1 class="text-2xl font-semibold">Dashboard</h1>
                    </header>
                    <main>
                        <h2 class="text-2xl font-bold text-white mb-6">Posts List</h2>
                        <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">NAME</th>
                                    <th class="px-4 py-2 border-b">TITLE</th>
                                    <th class="px-4 py-2 border-b">BODY</th>
                                    <th class="px-4 py-2 border-b">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-4 py-2 border-b">{{ $post->user->name }}</td>
                                        <td class="px-4 py-2 border-b">{{ $post->title }}</td>
                                        <td class="px-4 py-2 border-b">{{ $post->body }}</td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex gap-2">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="bg-indigo-600 text-black px-4 py-2 rounded-md hover:bg-indigo-700">Edit</a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
