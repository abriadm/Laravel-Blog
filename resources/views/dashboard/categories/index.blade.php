@extends('dashboard.layouts.main')

@section('container')
    <div class="flex justify-between">
        <h1 class="text-3xl font-semibold mb-2">Categories</h1>
        <a href="/dashboard/categories/create"
            class="bg-blue-500 mr-[5rem] hover:bg-blue-700 text-white font-bold w-fit h-fit text-center justify-center py-2 px-4 rounded">
            Create Category
        </a>
    </div>
    <hr class="mb-4" />

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Post
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->posts_count }}
                        </td>
                        <td class="flex px-6 py-4 gap-x-4">
                            <a href="/dashboard/categories/{{ $category->id }}"
                                class="font-medium text-orange-600 dark:text-orange-300 hover:underline">View</a>
                            <a href="/dashboard/categories/{{ $category->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="/dashboard/categories/{{ $category->id }}" method="POST">
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
