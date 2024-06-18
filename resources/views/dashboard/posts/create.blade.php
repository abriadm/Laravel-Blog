@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-3xl font-semibold mb-2">Create Post</h1>
    <hr class="mb-4" />

    <form class="max-w-full flex flex-col items-center" action="/dashboard/posts" method="POST">
        @csrf
        <div class="flex gap-x-4 w-[70%]">
            <div class="mb-4 w-full">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input type="text" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Judul Pertama" autofocus required />
            </div>
            <div class="mb-4 w-full">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
                <input type="text" id="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="judul-pertama" required />
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        
    </script>
@endsection
