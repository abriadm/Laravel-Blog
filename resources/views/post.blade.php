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
        <h1 class="mt-6 mb-4 text-xl font-semibold">Comments</h1>
        @cannot('admin')
            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" class="flex flex-col gap-y-2 w-[40rem] mb-6">
                    @csrf
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                        type="text" placeholder="Comments here...." name="body" required>
                    @error('body')
                        <div>{{ $message }}</div>
                    @enderror
                    <button type="submit"
                        class="bg-neutral-900 hover:bg-neutral-700 text-white text-xs font-medium w-fit h-fit self-end py-2 px-4 rounded-xl">Add
                        Comment</button>
                </form>
            @else
                <p class="mt-2 text-xl font-normal"><a class="font-medium hover:text-blue-500 hover:underline cursor-pointer"
                        href="{{ route('login') }}">Log in</a> to post a comment.</p>
            @endauth
        @endcannot

        <div class="w-[40rem] mt-4 flex flex-col gap-y-4">
            @forelse ($comments as $comment)
                <div class="w-full h-fit px-4 py-2 border">
                    <div class="flex gap-x-2 text-sm">
                        <p>{{ $comment->user->name }}</p>|
                        <p class="mr-auto">{{ $comment->created_at->diffForHumans() }}</p>
                        @cannot('admin')
                            @if (auth()->check() && auth()->user()->id === $comment->user_id)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:underline hover:text-red-900">Delete</button>
                                </form>
                            @endif
                        @endcannot
                    </div>
                    <h1 class="text-lg font-normal mt-2 text-wrap">{{ $comment->body }}</h1>
                </div>
            @empty
                <p class="text-lg">No Comments yet.</p>
            @endforelse
        </div>
        <br /><a class=" text-xl font-semibold text-blue-600 hover:underline" href="/posts">Back to Posts</a>
    </div>
@endsection
