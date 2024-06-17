@extends('layouts.main')

@section('container')
    <h1 class="text-xl font-semibold mb-4 border-b-2">By {{ $title }}</h1>
    <div class="">
        @foreach ($posts as $post)
            <article class="border-b-2 mb-2">
                <h2 class="mb-4 text-2xl font-bold hover:underline"><a
                        href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <a href="/category/{{ $post->category->slug }}"
                    class="hover:underline hover:text-blue-500">{{ $post->category->name }}</a>
                <p class="my-2">{{ $post->excerpt }}</p>
                <a class="hover:underline hover:text-blue-500" href="/posts/{{ $post->slug }}">Read more...</a>
            </article>
        @endforeach
    </div>
@endsection
