@extends('dashboard.layouts.main')

@section('container')
    <div class="flex justify-between">
        <h1 class="text-3xl font-semibold mb-2">Categories</h1>
        <a href="/dashboard/categories/create" class="bg-blue-500 mr-[5rem] hover:bg-blue-700 text-white font-bold w-fit h-fit text-center justify-center py-2 px-4 rounded">
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
                </tr>
            </thead>
        </table>

    </div>
@endsection