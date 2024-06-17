@extends('layouts.main')

@section('container')
    <h1 class="text-2xl font-bold">All Categories</h1>
    <ul class="flex mt-2 flex-wrap justify-between gap-x-4 gap-y-2">
        @foreach ($categories as $category)
            <li><a href="/posts?category={{ $category->slug }}">
                    <div class="relative max-w-[20rem] mx-auto mt-20">
                        <img class="h-64 w-full object-cover rounded-md"
                            src="https://images.unsplash.com/photo-1680725779155-456faadefa26" alt="Random image">
                        <div class="absolute inset-0 bg-gray-700 opacity-60 rounded-md"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h2 class="text-white text-3xl font-bold">{{ $category->name }}</h2>
                        </div>
                    </div>
                </a></li>
        @endforeach
    </ul>
@endsection
