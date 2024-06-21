@extends('dashboard.layouts.main')

@section('container')
    <div class="flex justify-between">
        <h1 class="text-3xl font-semibold mb-2">My Post</h1>
        <a href="/dashboard/posts/create"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create
            new Post</a>
    </div>
    <hr class="mb-4" />

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->created_at->diffForHumans() }}
                        </td>
                        <td class="flex px-6 py-4 gap-x-4">
                            <a href="/dashboard/posts/{{ $post->slug }}"
                                class="font-medium text-orange-600 dark:text-orange-300 hover:underline">View</a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are u sure?')" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
