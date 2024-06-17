@extends('layouts.main')

@section('container')
    <img src="/assets/{{ $img }}" class="w-[20rem] h-[15rem] object-cover rounded-2xl" alt="{{ $title }}" />
    <h1 class="text-xl font-semibold mt-2">{{ $name }}</h1>
    <h2 class="mt-2 font-mono font-semibold text-lg">Age: {{ $age }}</h2>
    <h2 class="mt-2 font-mono font-semibold text-lg">Status: {{ $status }}</h2>
@endsection
