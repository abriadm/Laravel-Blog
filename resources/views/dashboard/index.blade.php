@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-2 text-4xl font-semibold">Hello {{ auth()->user()->name }}</h1>
    <hr />
@endsection