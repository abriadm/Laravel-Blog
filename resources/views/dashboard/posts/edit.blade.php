@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-3xl font-semibold mb-2">Edit Post</h1>
    <hr class="mb-4" />

    <form class="max-w-full flex flex-col mb-6" action="/dashboard/posts/{{ $post->slug }}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="flex gap-x-4 w-[70%]">
            <div class="mb-4 w-full">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Judul Pertama" autofocus required value="{{ old('title', $post->title) }}" />
                @error('title')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-4 w-full">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="judul-pertama" required value="{{ old('slug', $post->slug) }}" />
                @error('slug')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="w-[20rem] self-start">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Select Category</label>
            <select id="category_id" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-[25rem] self-start">
            <label class="block mb-2 mt-4 text-sm font-medium text-gray-900" for="image">Upload file</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-[20rem] object-cover">
            @else
                <img class="img-preview w-full h-[20rem] object-cover">
            @endif
            <input
                class="block w-full overflow-hidden text-sm text-gray-900 border border-gray-300  cursor-pointer bg-gray-50"
                id="image" name="image" type="file" onchange="previewImage()">
            <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG.</p>
            @error('image')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="body" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('slug', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-fit px-5 py-2.5 text-center">Submit</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('change', function() {
                fetch('/dashboard/posts/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug);
            });
        });

        function previewImage() {
            const image = document.querySelector("#image");
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
