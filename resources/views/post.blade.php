@extends('layouts.main')

@section('container')
    <div class="max-w-[55rem] mb-8">
        <h1 class="mb-2 text-2xl font-bold self-start">{{ $post->title }}</h1>
        <p class="self-start mb-4">By <a class="hover:underline hover:text-blue-500"
                href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a> in <a
                href="/posts?category={{ $post->category->slug }}"
                class="hover:underline hover:text-blue-500">{{ $post->category->name }}</a></p>
        @if ($post->image)
            <div class="full h-[30rem] overflow-hidden mb-4">
                <img class="object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
        @else
            <div class="full h-[30rem] overflow-hidden mb-4">
                <img class="object-cover"
                    src="https://images.unsplash.com/photo-1717894757090-0431cede14ae?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="{{ $post->title }}">
            </div>
        @endif
        <div class="flex mt-2 flex-col gap-y-2">
            {!! $post->body !!}
        </div>
        <br /><a class=" text-xl font-semibold text-blue-600 hover:underline" href="/posts">Back to Posts</a>
    </div>
@endsection
