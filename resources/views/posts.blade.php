@extends('layouts.main')

@section('container')

    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-2xl font-semibold">{{ $title }}</h1>
        <form action="/posts">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif

            <div class="pt-2 relative mx-auto text-gray-600">
                <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search">
                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                        width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    @if ($posts->count())
        <div class="relative flex bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-full flex-row">
            <div
                class="relative w-2/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none bg-clip-border rounded-xl shrink-0">
                <a href="/posts/{{ $posts[0]->slug }}">
                    @if ($posts[0]->image)
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->slug }}"
                            class="object-cover w-full h-[20rem]" />
                    @else
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                            alt="card-image" class="object-cover w-full h-full" />
                    @endif
                </a>
            </div>
            <div class="p-6">
                <h6
                    class="block mb-4 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-gray-700 uppercase">
                    by <a class="hover:underline"
                        href="/posts?author={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                    in
                    <a class="hover:underline"
                        href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                </h6>
                <a href="/posts/{{ $posts[0]->slug }}"
                    class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $posts[0]->title }}
                </a>
                <p class="mb-2 text-sm font-medium">{{ $posts[0]->created_at->diffForHumans() }}</p>
                <p class="block mb-8 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                    {{ $posts[0]->excerpt }}
                </p>
                <a href="/posts/{{ $posts[0]->slug }}" class="inline-block"><button
                        class="flex items-center gap-2 px-6 py-3 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none hover:bg-gray-900/10 active:bg-gray-900/20"
                        type="button">
                        Read more<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3">
                            </path>
                        </svg></button></a>
            </div>
        </div>

        {{-- Card --}}
        <div class="flex w-full flex-wrap my-8 gap-y-12 justify-between">
            @foreach ($posts->skip(1) as $post)
                <div
                    class="relative w-[25rem] h-fit flex flex-col overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div
                        class="relative overflow-hidden text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                        <a href="/posts/{{ $post->slug }}">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    alt="{{ $post->title }}" class="h-[20rem] w-full object-cover"/>
                            @else
                                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                                    alt="ui/ux review check" />
                            @endif
                        </a>
                    </div>
                    <div class="p-6">
                        <a href="/posts/{{ $post->slug }}"
                            class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            {!! Str::limit($post->title, 20) !!}
                        </a>
                        <p class="block mt-3 text-wrap font-sans text-xl antialiased font-normal leading-relaxed text-gray-700">
                            {!! Str::limit($post->body, 100) !!}
                        </p>
                    </div>
                    <div class="flex items-center justify-between p-6">
                        <div class="flex items-center -space-x-3">
                            <p>By <a class="hover:underline hover:text-blue-500"
                                    href="/posts?author={{ $post->user->username }}">{{ $post->user->name }}</a> in <a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="hover:underline hover:text-blue-500">{{ $post->category->name }}</a></p>
                        </div>
                        <p class="block font-sans text-base antialiased font-normal leading-relaxed text-inherit">
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h1 class="text-xl font-semibold">No post found.</h1>
    @endif

    {{ $posts->links() }}
@endsection
