@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-[70rem] mb-8">
        <div class="flex gap-x-2 items-center">
            <a href="/dashboard/posts"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back
                to Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                @method('delete')
                @csrf
                <button onclick="return confirm('Are u sure?')"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
            </form>
        </div>
        <h1 class="mb-2 text-2xl font-bold self-start">{{ $post->title }}</h1>
        @if ($post->image)
        <div class="full h-[30rem] mt-2 overflow-hidden mb-4">
            <img class="object-cover"
                src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->title }}">
        </div>
        @else
            <div class="full h-[30rem] mt-2 overflow-hidden mb-4">
                <img class="object-cover"
                    src="https://images.unsplash.com/photo-1717894757090-0431cede14ae?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="{{ $post->title }}">
            </div>
        @endif
        <div class="flex mt-2 flex-col gap-y-2">
            {!! $post->body !!}
        </div>
    </div>
@endsection
